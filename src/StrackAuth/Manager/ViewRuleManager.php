<?php
namespace StrackAuth\Manager;

use StrackAuth\Rules\Rule;
use StrackAuth\Rules\ViewRule;

class ViewRuleManager
{
    protected $_rules;

    /**
     * @param $ruleArray
     */
    public function addRule($ruleArray)
    {
        $view_rule = new ViewRule($ruleArray);
        $this->_rules[$ruleArray['name']] = $view_rule;
    }

    /**
     * @param $viewName
     * @return mixed
     */
    public function getAccess($viewName)
    {
        if (array_key_exists($viewName, $this->_rules)) {
            $tempName = $viewName;
        } else {
            $tempName = "*";
        }

        $rule = $this->_rules[$tempName];
        return $rule->getPermission();
    }

    /**
     * @param $viewName
     * @param $wishPermission
     * @return bool
     */
    public function checkAccess($viewName, $wishPermission)
    {
        $tempPermission = is_string($wishPermission) ? Rule::getPermissionNumber($wishPermission) : $wishPermission;
        return ($this->getAccess($viewName) >= $tempPermission);
    }
}