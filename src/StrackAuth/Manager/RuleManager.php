<?php
namespace StrackAuth\Manager;


class RuleManager
{
    public $projectRuleMgr;
    public $columnRuleMgr;
    public $viewRuleMgr;

    public function __construct()
    {
        $this->projectRuleMgr = new ProjectRuleManager();
        $this->columnRuleMgr = new ColumnRuleManager();
        $this->viewRuleMgr = new ViewRuleManager();
        $this->addDefaultRule();
    }

    /**     * @param $rulesJson
     */
    public function addRules($rulesJson)
    {
        $rules = json_decode($rulesJson, true);
        foreach ($rules as $rule) {
            switch ($rule["category"]) {
                case "project":
                    $this->projectRuleMgr->addRule($rule);
                    break;
                case "column":
                    $this->columnRuleMgr->addRule($rule);
                    break;
                case "view":
                    $this->viewRuleMgr->addRule($rule);
            }
        }
    }

    public function getRuleManager($category)
    {
        switch (strtolower($category)) {
            case "project":
                return $this->projectRuleMgr;
            case "column":
                return $this->columnRuleMgr;
            case "view":
                return $this->viewRuleMgr;
        }
    }

    protected function addDefaultRule()
    {
        //"category": "project", "uuid": "*", "permission":"view"
        $defaultProjectRule = [
            "category" => "project",
            "uuid" => "*",
            "permission" => "view"
        ];
        $this->projectRuleMgr->addRule($defaultProjectRule);

        // {'category': 'column', '$entity_type_uuid': '1111111111', 'permission':'view', 'column_uuid':'123', 'column_code':'123'}
        $defaultColumnRule = [
            "category" => "column",
            "entity_type_uuid" => "*",
            "permission" => "view",
            "column_uuid" => "*",
            "column_code" => "*"
        ];
        $this->columnRuleMgr->addRule($defaultColumnRule);

        // {'category': 'menu', 'name': '1111111111', 'permission':'view'}
        $defaultViewRule = [
            "category" => "menu",
            "name" => "*",
            "permission" => "view"
        ];
        $this->viewRuleMgr->addRule($defaultViewRule);
    }


}
