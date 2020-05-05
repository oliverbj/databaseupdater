<?php

namespace Oliverbj\DatabaseUpdater;
use Illuminate\Support\Facades\Config; 
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Oliverbj\DatabaseUpdater\ParseXMLFile;
use Illuminate\Support\Arr;

class DatabaseUpdater
{


    private $connection;
    private $database;
    private $table;
    private $columns = [];
    private $config;
    private $uniqueValue;
    private $value = null;

    public function __construct()
    {
         
        $this->setDatabase(config('databaseupdater.default.database')); 
        $this->setTable(config('databaseupdater.default.table'));
        $this->setColumns();   
    }


    protected function setDatabase(string $database)
    {
        if (!in_array($database, array_keys(config("databaseupdater.databases")))) {
            throw new \Exception("The database '{$database}' is not configured in the config file.");
        }


        $this->database = $database;
        
        return $this;

    }

    public function database(string $database)
    {
        $this->setDatabase($database);
        
        return $this;
    }


    protected function setTable(string $table)
    {

        if (!in_array($table, array_keys(config("databaseupdater.databases.{$this->database}.tables")))) {
            throw new \Exception("The table '{$table}' is not configured in the config file.");
        }

        if (!Schema::hasTable($table)) {
             throw new \Exception("The table: '{$table}' does not exist in the database.");
        }

        $this->table = $table;
        $this->config = Config::get("databaseupdater.databases.{$this->database}.tables.{$table}");
        
        return $this;

    }

    public function table(string $table)
    {

        $this->setTable($table);
        $this->setColumns();

        return $this;
    }

    protected function setColumns(array $columns = [])
    {

        if(empty($columns))
        {
           $this->columns = Config::get("databaseupdater.databases.{$this->database}.tables.{$this->table}.columns");
        }else{
        
            $this->columns = $columns;
        }
       

        return $this;
    }

    /*
    public function columns(array $columns)
    {

        $this->columns = $columns;
        
        return $this;
    } */

    protected function insertData(array $ColumnAndValues)
    {
        DB::connection($this->database)->table($this->table)->insert($ColumnAndValues);
    }

    /**
     * This method updates the specific entry in the database.
     *
     */
    protected function updateData(array $ColumnAndValues)
    {

        if(isset($ColumnAndValues['CreatedAt'])){
            unset($ColumnAndValues['CreatedAt']);
        }

        DB::connection($this->database)->table($this->table)->where($this->config['UpdateKey'], $this->UniqueValue)->update($ColumnAndValues);
    }

    public function update(array $parameters)
    {

        if(!isset($parameters['xml']))
        {
            throw new \Exception("Please specify a xml key for the update method.");
        }

        if(!isset($parameters['UniqueValue']))
        {
            throw new \Exception("Please specify an UniqueValue key for the update method.");
        }

        $this->UniqueValue = $parameters['UniqueValue'];

        $exists = DB::connection($this->database)->table($this->table)->select(DB::raw("count(*)"))->where($this->config['UpdateKey'], $this->UniqueValue)->count();

        $ColumnAndValues = $this->parse($parameters['xml']);

        try {
            if($exists > 0){
                return $this->updateData($ColumnAndValues);
            }

            return $this->insertData($ColumnAndValues);

        }catch(\Illuminate\Database\QueryException $e) {
            throw new \Exception($e->getMessage());
        }

    }

    /**
     * This function parses the XML files according to the rules in the config/databaseupdater.php file.
     * 
     * Further is reads each tag, and if it is empty it will add the "default =>" value to the tag.
     */
    protected function parse(string $xmlFile) : array
    {

     
    
        $xml = \XmlParser::extract($xmlFile);
      #  dd($xml);
        $xml = $xml->parse($this->config['Columns']);
      #  dd($xml);
        foreach($xml as $tag => $value)
        {
            if(isset($this->config['Columns'][$tag]))
            {

                
                if(isset($this->config['Columns'][$tag]['Index'])){
                    $index = $this->config['Columns'][$tag]['Index'];
                    //We can only go one level down in an array ATM.
                    if( isset($xml[$tag][0][$index])){
                        $xml[$tag] = $xml[$tag][0][$index];
                    }else{
                        
                          $xml[$tag] = isset($this->config['Columns'][$tag]['default']) ?  $this->config['Columns'][$tag]['default'] : null;
                        
                        
                    }
                    
                }


                //If any rules.
                if(isset($this->config['Columns'][$tag]['Rule'])){
                    $this->value = $xml[$tag];
                    $arguments = isset($this->config['Columns'][$tag]['Arguments']) ? $this->config['Columns'][$tag]['Arguments'] : [];
                    $xml[$tag] = $this->{$this->config['Columns'][$tag]['Rule']}($arguments);
                }




            }
        }


        return $xml;
    }

    /**
     * Rules
     */
     protected function substring(array $arguments)
     {
        return substr($this->value, $arguments['start'], $arguments['end']);
     }

     protected function currentTime()
     {
         return \Carbon\Carbon::now()->format('Y-m-d\TH:i:s');
     }

  
}
