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
 * @var $learnMore string
 * @var $link string
 * @var $consent array
 */

use yii\helpers\Html; ?>

<div class="cookie-consent-popup" data-backdrop="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content bg-light border-0 rounded-0">
            <div class="modal-header  border-0">
                <h5 class="modal-title" id="staticBackdropLabel">
                    <i class="fas fa-cookie-bite mr-2 fa-fw"></i>
                    <?= $title ?>
                </h5>
            </div>
            <div class="modal-body py-2">
                <div class="container-fluid px-0">
                    <p class="cookie-consent-message">
                        <span class="cookie-consent-text"><?= $message ?></span>
                        <?= Html::a($learnMore, $link, ['class' => 'cookie-consent-link']) ?>
                    </p>
                </div>
                <div class="container-fluid px-0 cookie-consent-controls d-none <?= (!empty($visibleControls)) ? 'show' : '' ?>">
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
                <div class="container-fluid px-0">
                    <div id="cookie-consent-details" class="collapse">
                        <?php foreach ($consent as $key => $item) : ?>
                            <?php if (!empty($item['details'])) : ?>
                                <p><b><?= $item["label"] ?></b></p>
                                <dl class="row">
                                    <?php foreach ($item['details'] as $detail) : ?>
                                        <?php if (!empty($detail['title']) && !empty($detail['description'])) : ?>
                                            <dt class="col-sm-3"><?= $detail['title'] ?></dt>
                                            <dd class="col-sm-9"><?= $detail['description'] ?></dd>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </dl>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <div class=" modal-footer border-0">
                <button class="btn btn-outline-secondary rounded-0 btn-sm" data-toggle="collapse" data-target="#cookie-consent-details" aria-expanded="false" aria-controls="cookie-consent-details">
                    <?= $detailsOpen ?>
                </button>
                <button class="btn btn-outline-secondary rounded-0 btn-sm cookie-consent-accept-necessary"><?= $acceptNecessary ?></button>
                <button class="btn btn-ostendis btn-sm cookie-consent-accept-all"><?= $acceptAll ?></button>
            </div>
        </div>
    </div>
</div>