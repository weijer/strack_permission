<?php
namespace StrackAuth\Manager;

use StrackAuth\Rules\Rule;
use StrackAuth\Rules\ProjectRule;

class ProjectRuleManager
{
    protected $_rules;

    /**
     * 保存项目相关的权限
     * @param $ruleArray
     */
    public function addRule($ruleArray)
    {
        $projectRule = new ProjectRule($ruleArray);
        $this->_rules[$ruleArray['uuid']] = $projectRule;
    }

    /**
     * 获取项目权限规则
     * @param $projectUUID
     * @return bool 是否有权限
     */
    public function getAccess($projectUUID)
    {
        if (array_key_exists($projectUUID, $this->_rules)) {
            $tempProject = $projectUUID;
        } else {
            $tempProject = "*";
        }

        return $this->_rules[$tempProject]->getPermission();
    }

    /**
     * 验证权限规则
     * @param $projectUUID
     * @param $wishPermission
     * @return bool
     */
    public function checkAccess($projectUUID, $wishPermission = 0)
    {
        if (is_string($wishPermission)) {
            $tempPermission = Rule::getPermissionNumber($wishPermission);
            return ($this->getAccess($projectUUID) >= $tempPermission);
        } else {
            return ($this->getAccess($projectUUID) >= $wishPermission);
        }
    }
}