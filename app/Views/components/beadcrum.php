<div class="app-content-header"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0"><?= esc(end($data)) ?></h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <?php foreach ($data as $index => $item): ?>
                        <?php if( count($data) == $index+1 ):?>
                            <li class="breadcrumb-item active" aria-current="page">
                                <?= esc($item) ?>
                            </li>
                        <?php else:?>
                                <li class="breadcrumb-item">
                                    <a href="<?=site_url($item)?>">
                                        <?= esc($item) ?>
                                    </a>
                                </li>
                        <?php endif;?>

                    <?php endforeach; ?>
                </ol>
            </div>
        </div> <!--end::Row-->
    </div> <!--end::Container-->
</div>