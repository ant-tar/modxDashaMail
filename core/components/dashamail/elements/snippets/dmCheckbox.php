<?php
$cbNameSuffix = $modx->getOption('dashamail_list_id');
$cbName = 'dmmscartsubscribe'.$cbNameSuffix;
$params = ['dmCheckboxName' => $cbName, 'dmCheckboxId' => $cbName];
return $modx->getChunk('dmCheckboxTpl', $params);