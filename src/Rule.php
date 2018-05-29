<?php
/**
 * Created by PhpStorm.
 * User: mayn
 * Date: 2017/11/9
 * Time: 17:30
 * 权限的具体规则
 */

namespace Permission;


class Rule
{

    //定义常量
    const Deny = 0;
    const View = 1;
    const Create = 2;
    const Edit = 3;
    const Delete = 4;

    // rule 的类型，现在有 project，entity，view的
    protected $_category;

    // 权限，有 deny，view, edit, create, delete
    protected $_permission;

    /**
     * Rule constructor.
     * @param $_category
     * @param $_permission
     */
    public function __construct($_category, $_permission = "")
    {
        $this->_category = $_category;
        $this->setPermission($_permission);
    }

    /**
     * 将字符权限转成数字
     * @param $permissionString
     * @return int
     */
    public static function getPermissionNumber($permissionString)
    {
        switch (strtolower($permissionString)) {
            case "deny":
                $permissionNumber = self::Deny;
                break;
            case "view":
                $permissionNumber = self::View;
                break;
            case "create":
                $permissionNumber = self::Create;
                break;
            case "edit":
                $permissionNumber = self::Edit;
                break;
            case "delete":
                $permissionNumber = self::Delete;
                break;
            default:
                $permissionNumber = self::Deny;
                break;
        }
        return $permissionNumber;
    }

    /**
     * 返回语义化的权限
     * @return string
     */
    public function getPermissionString()
    {
        $permissionString = '';
        switch ($this->_permission) {
            case 0:
                $permissionString = "deny";
                break;
            case 1:
                $permissionString = "view";
                break;
            case 2:
                $permissionString = "create";
                break;
            case 3:
                $permissionString = "edit";
                break;
            case 4:
                $permissionString = "delete";
                break;
        }
        return $permissionString;
    }

    /** 比较两个权限
     * @param $permissionA
     * @param $permissionB
     * @return bool
     */
    public static function comparePermission($permissionA, $permissionB)
    {
        if ($permissionA > $permissionB) {
            return true;
        } else {
            return false;
        }

    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->_category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->_category = $category;
    }



    /**
     * @return mixed
     */
    public function getPermission()
    {
        return $this->_permission;
    }

    /**
     * @param mixed $permission
     */
    public function setPermission($permission)
    {
        $this->_permission = self::getPermissionNumber($permission);
    }
}
