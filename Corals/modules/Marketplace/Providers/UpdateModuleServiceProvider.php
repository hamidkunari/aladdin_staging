<?php

namespace Corals\Modules\Marketplace\Providers;

use Corals\Foundation\Providers\BaseUpdateModuleServiceProvider;

class UpdateModuleServiceProvider extends BaseUpdateModuleServiceProvider
{
    protected $module_code = 'corals-marketplace';
    protected $batches_path = __DIR__ . '/../update-batches/*.php';
}
