<div class="container">
    <?php foreach ($viewData as $key => $value) { ?>
        <?php $name = str_replace('_', ' ', $key); $alt = explode(' ', $name); $alt = $alt[1];?>

        <legend id="showTable_<?= $key ?>" style="text-align: center"><i class="fa fa-angle-double-down" aria-hidden="true"></i> <?= $name ?> <i class="fa fa-angle-double-down" aria-hidden="true"></i></legend>
        <div class="row">
            <div class="table hidden" id="BTC_<?= $key ?>">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="col-md-1 col-sm-1" style="text-align: center">BTC to <?= $alt ?></th>
                            <th class="col-md-1 col-sm-1" style="text-align: center"><?= $alt ?> to BTC</th>
                            <th class="col-md-1 col-sm-1" style="text-align: center">Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($value as $d) { ?>
                            <tr>
                                <td style="text-align: center"> <?= $d['rate_btc'] ?></td>
                                <td style="text-align: center"> <?= $d['rate_alt'] ?></td>
                                <td style="text-align: center"> <?= $d['created_at'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } ?>
</div>
