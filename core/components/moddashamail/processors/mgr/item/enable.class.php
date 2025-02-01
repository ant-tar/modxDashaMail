<?php

class modDashaMailItemEnableProcessor extends modObjectProcessor
{
    public $objectType = 'modDashaMailItem';
    public $classKey = 'modDashaMailItem';
    public $languageTopics = ['moddashamail'];
    //public $permission = 'save';


    /**
     * @return array|string
     */
    public function process()
    {
        if (!$this->checkPermissions()) {
            return $this->failure($this->modx->lexicon('access_denied'));
        }

        $ids = $this->modx->fromJSON($this->getProperty('ids'));
        if (empty($ids)) {
            return $this->failure($this->modx->lexicon('moddashamail_item_err_ns'));
        }

        foreach ($ids as $id) {
            /** @var modDashaMailItem $object */
            if (!$object = $this->modx->getObject($this->classKey, $id)) {
                return $this->failure($this->modx->lexicon('moddashamail_item_err_nf'));
            }

            $object->set('active', true);
            $object->save();
        }

        return $this->success();
    }

}

return 'modDashaMailItemEnableProcessor';
