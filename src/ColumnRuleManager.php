<?php
namespace Permission;

class ColumnRuleManager
{
    protected $_rules;

    /**
     * @param $ruleArray
     */
    public function addRule($ruleArray)
    {
        $colRule = new ColumnRule($ruleArray);
        $this->_rules[$ruleArray['entity_type_uuid']] = $colRule;
    }

    /**
     * @param $entityTypeUUID
     * @param string $columnUUID
     * @return int
     */
    public function getAccess($entityTypeUUID, $columnUUID = "*")
    {
        if (array_key_exists($entityTypeUUID, $this->_rules)) {
            $rule = $this->_rules[$entityTypeUUID];
            $tempColumnUUID = $rule->getColumnUuid();
            if ($tempColumnUUID == $columnUUID) {
                return $rule->getPermission();
            } else {
                return Rule::Deny;
            }
        } else if (array_key_exists("*", $this->_rules)) {
            $rule = $this->_rules[$entityTypeUUID];
            return $rule->getPermission();
        }
    }

    /**
     * @param $entityTypeUUID
     * @param string $columnUUID
     * @param $wishPermission
     * @return bool
     */
    public function checkAccess($entityTypeUUID, $columnUUID = "*", $wishPermission)
    {
        if (is_string($wishPermission)) {
            $tempPermission = Rule::getPermissionNumber($wishPermission);
            return ($this->getAccess($entityTypeUUID, $columnUUID) >= $tempPermission);
        } else {
            return ($this->getAccess($entityTypeUUID, $columnUUID) >= $wishPermission);
        }
    }
}