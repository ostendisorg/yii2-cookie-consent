<?php

/**
 * @link http://www.diemeisterei.de
 * @copyright Copyright (c) 2019 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * --- VARIABLES ---
 *
 * @var $title string
 * @var $save string
 * @var $learnMore string
 * @var $link string
 * @var $consent array
 */

use yii\helpers\Html; ?>

<div class="modal fade cookie-consent-popup" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><?= $title ?></h5>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <p class="cookie-consent-message">
                        <span class="cookie-consent-text"><?= $message ?></span>
                        <?= Html::a($learnMore, $link, ['class' => 'cookie-consent-link']) ?>
                    </p>
                </div>
                <div class="container-fluid cookie-consent-controls <?= (!empty($visibleControls)) ? 'show' : '' ?>">
                    <?php foreach ($consent as $key => $item) : ?>
                        <div class="form-check form-check-inline mb-3">
                            <?= Html::checkbox($key, $item["checked"], [
                                'class' => 'form-check-input cookie-consent-checkbox',
                                'data-cc-consent' => $key,
                                'disabled' => $item["disabled"],
                                'id' => $key
                            ]) ?>
                            <label for="<?= $key ?>" class="cookie-consent-control mb-0"><?= $item["label"] ?></label>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="container-fluid">
                    <button class="btn btn-outline-secondary btn-sm" data-toggle="collapse" data-target="#cookie-consent-details" aria-expanded="false" aria-controls="cookie-consent-details">
                        <?= $detailsOpen ?>
                    </button>
                    <div id="cookie-consent-details" class="collapse">
                        <?php foreach ($consent as $key => $item) : ?>
                            <?php if (!empty($item['details'])) : ?>
                                <p><?= $item["label"] ?></p>
                                <dl class="row">
                                    <?php foreach ($item['details'] as $detail) : ?>
                                        <?php if (!empty($detail['title']) && !empty($detail['description'])) : ?>
                                            <dt class="col-sm-3"><?= $detail['title'] ?>
                                </dl>
                                <dd class="col-sm-9"><?= $detail['description'] ?></dd>
                            <?php endif ?>
                        <?php endforeach ?>
                        </dl>
                    <?php endif ?>
                <?php endforeach ?>
                    </div>
                </div>

            </div>
            <div class=" modal-footer">
                <button class="btn btn-secondary cookie-consent-accept-all"><?= $acceptAll ?></button>
                <button class="btn btn-secondary cookie-consent-accept-necessary"><?= $acceptNecessary ?></button>
            </div>
        </div>
    </div>
</div>