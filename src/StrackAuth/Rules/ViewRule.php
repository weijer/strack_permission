<?php
namespace StrackAuth\Rules;

// {'category': 'menu', 'name': '1111111111', 'permission':'view'}
class ViewRule extends Rule
{
    //view或者菜单名称
    protected $_name;

    /**
     * ColumnRule constructor.
     * @param $rule
     */
    public function __construct($rule)
    {
        parent::__construct($rule['category'], $rule['permission']);
        $this->_name = $rule['name'];
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->_name = $name;
    }

}