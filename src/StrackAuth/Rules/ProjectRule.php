<?php
namespace StrackAuth\Rules;

/**
 *  数据格式
 * {'category': 'project', 'uuid': '1111111111', 'permission':'view'}
 * {'category': 'entity',  'uuid': '1111111111', 'permission':'view'}
 */

class ProjectRule extends Rule
{
    // 项目的uuid
    protected $_uuid;

    /**
     * @return mixed
     */
    public function getUuid()
    {
        return $this->_uuid;
    }

    /**
     * @param mixed $uuid
     */
    public function setUuid($uuid)
    {
        $this->_uuid = $uuid;
    }

    /**
     * ProjectRule constructor.
     * @param $rule
     */
    public function __construct($rule)
    {
        parent::__construct($rule['category'], $rule['permission']);
        $this->_uuid = $rule['uuid'];
    }

    /**
     * 作为数组使用
     * @param $rule
     */
    public function init($rule)
    {
        $this->_uuid = $rule['uuid'];
        $this->_category = $rule['category'];
        parent::setPermission($rule['permission']);
    }
}