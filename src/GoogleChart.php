<?php

namespace Spaceboy\GoogleCharts;

use Spaceboy\SpaceTools;
use Latte;

abstract class GoogleChart extends \Nette\Object {

    const   DATA_LENGTH = NULL;


    /** @var string */
    protected   $style          = ''; //width: 900px; height: 500px;';

    /** @var array */
    protected   $options        = [
        'title' => 'My chart',
    ];

    /** @var array */
    protected   $data           = [];

    /** @var array */
    protected   $columnNames    = ['title', 'amount'];

    /** @var array */
    protected   $roles          = [];

    /** @var integer */
    protected   $dataLength;

    /** @var string */
    protected   $id;

    /** @var string */
    protected   $chartType;

    /**
     * Adds data
     * @param mixed
     * @return Spaceboy\ChoogleChart
     */
    public function addData () {
        $this->data[] = $this->getRow(func_get_args());
        return $this;
    }

    /**
     * Adds option
     * @param string $name option name
     * @param mixed $value option value
     * @return Spaceboy\GoogleChart
     */
    public function addOption ($name, $value) {
        $this->options[$name] = $value;
        return $this;
    }

    /**
     * Adds option as object
     * @param string $name option name
     * @param array $value array to be conversed to object
     * @return Spaceboy\GoogleChart
     */
    public function addOptionAsObject ($name, $value) {
        $obj = new \stdClass();
        foreach ($value AS $key => $val) {
            $obj->$key = $val;
        }
        $this->options[$name] = $obj;
        return $this;
    }

    /**
     * Adds role(s)
     * @param mixed $roles
     * @return Spaceboy\GoogleChart
     */
    public function addRole () {
        $this->roles = array_merge($this->roles, SpaceTools::toArray(func_get_args()));
        return $this;
    }

    /**
     * Clears all data
     * @return Spaceboy\GoogleChart
     */
    public function clearData () {
        $this->data = [];
        return $this;
    }

    /**
     * Returns JSON encoded chart data
     * @return string
     */
    public function getData () {
        $colRoles = [$this->columnNames];
        foreach ($this->roles AS $item) {
            $role = new \stdClass();
            $role->role = $item;
            $colRoles[0][] = $role;
        }
        return json_encode(array_merge($colRoles, $this->data));
    }

    /**
     * Returns JSON encoded chart options
     * @return string
     */
    public function getOptions () {
        return json_encode($this->options);
    }

    /**
     * Returns inline style
     * @return string
     */
    public function getStyle () {
        return ($this->style ?: '');
    }

    /**
     * Column names setter
     * @param string (set of strings)
     * @return Spaceboy\GoogleChart
     */
    public function setColumnNames () {
        if (($size = sizeof($row = SpaceTools::toArray(func_get_args()))) != $this->dataLength && !is_null($this->dataLength)) {
            throw new \Exception("Column names error: {$this->dataLength}" . static::DATA_LENGTH . " items expected, {$size} received.");
        }
        $this->columnNames = $row;
        return $this;
    }

    /**
     * Data setter; sets whole dataset at once
     * @param array $data
     * @return Spaceboy\GoogleChart
     */
    public function setData (array $data) {
        $this->data = $data;
        return $this;
    }

    /**
     * Inline style setter
     * @param string $style inline style
     * @return Spaceboy\GoogleChart
     */
    public function setStyle ($style) {
        $this->style = $style;
        return $this;
    }

    /**
     * Returns input values as flat array; checks size
     * @param array of mixed
     * @return array
     * @throws Exception
     */
    protected function getRow ($args) {
        $roleSize = sizeof($this->roles);
        if (($size = sizeof($row = SpaceTools::toArray($args))) != ($this->dataLength + $roleSize) && !is_null($this->dataLength)) {
            throw new \Exception("Data error: {$this->dataLength} (+{$roleSize}) items expected, {$size} received.");
        }
        return $row;
    }

    /**
     * Returns HTML ID of chart
     * @return string
     */
    public function getId () {
        return $this->id;
    }

    /**
     * Sets HTML ID of chart
     * @param string id
     * @return Spaceboy\GoogleChart
     */
    public function setId ($id) {
        $this->id   = $id;
        return $this;
    }

    /**
     * Returns Title of chart
     * @return string
     */
    public function getTitle () {
        return $this->options['title'];
    }

    /**
     * Sets HTML ID of chart
     * @param string title
     * @return Spaceboy\GoogleChart
     */
    public function setTitle ($title) {
        $this->options['title'] = $title;
        return $this;
    }

    /**
     * Returns HTML code of GoogleChart API
     * @return string
     */
    public function insertApi () {
        return file_get_contents(__DIR__ . '/templates/chart-api.latte');
    }

    /**
     * Returns HTML code of GoogleChart
     * @return string
     */
    public function insertChart () {
        $latte  = new Latte\Engine;
        return $latte->renderToString(__DIR__ . '/templates/chart.latte', [
            'id'    => $this->id,
            'type'  => $this->chartType,
            'chart' => $this,
        ]);
    }

    /**
     * Constructor of GoogleChart
     * @param string HTML ID
     * @param string GoogleChart type
     */
    public function __construct ($id = NULL, $type = NULL) {
        if (is_null($type)) {
            $cName  = explode('\\', get_class($this));
            $this->chartType   = array_pop($cName);
        } else {
            $this->chartType   = $type;
        }
        $this->dataLength   = static::DATA_LENGTH;
        $this->id           = ($id ?: uniqid('chart-'));
    }

}
