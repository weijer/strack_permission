<?php
namespace Permission;

/**
 * 数据格式
 * {'category': 'column', '$entity_type_uuid': '1111111111', 'permission':'view', 'column_uuid':'123', 'column_code':'123'}
 */

class ColumnRule extends ProjectRule
{
    // 所有列
    const All = "*";
    // entity type 的uuid
    protected $_entity_type_uuid;
    // 自定义字段的uuid
    protected $_column_uuid;
    protected $_column_code;

    /**
     * ColumnRule constructor.
     * @param $rule
     */
    public function __construct($rule)
    {
        parent::__construct($rule);
        $this->_entity_type_uuid = $rule['entity_type_uuid'];
        $this->_column_uuid = $rule['column_uuid'];
        $this->_column_code = $rule['column_code'];
    }

    /**
     * 作为数组使用
     * @param  $rule
     */
    public function init($rule)
    {
        parent::init($rule);
        $this->_entity_type_uuid = $rule['entity_type_uuid'];
        $this->_column_uuid = $rule['column_uuid'];
        $this->_column_code = $rule['column_code'];
    }


    /**
     * @return mixed
     */
    public function getEntityTypeUuid()
    {
        return $this->_entity_type_uuid;
    }

    /**
     * @param mixed $entity_type_uuid
     */
    public function setEntityTypeUuid($entity_type_uuid)
    {
        $this->_entity_type_uuid = $entity_type_uuid;
    }

    /**
     * @return mixed
     */
    public function getColumnUuid()
    {
        return $this->_column_uuid;
    }

    /**
     * @param mixed $column_uuid
     */
    public function setColumnUuid($column_uuid)
    {
        $this->_column_uuid = $column_uuid;
    }

    /**
     * @return mixed
     */
    public function getColumnCode()
    {
        return $this->_column_code;
    }

    /**
     * @param mixed $column_code
     */
    public function setColumnCode($column_code)
    {
        $this->_column_code = $column_code;
    }
}