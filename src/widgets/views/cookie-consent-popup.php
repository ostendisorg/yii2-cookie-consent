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
                        <div class="form-check form-check-inline">
                            <?= Html::checkbox($key, $item["checked"], [
                                'class' => 'form-check-input cookie-consent-checkbox',
                                'data-cc-consent' => $key,
                                'disabled' => $item["disabled"],
                                'id' => $key
                            ]) ?>
                            <label for="<?= $key ?>" class="cookie-consent-control"><?= $item["label"] ?></label>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="container-fluid cookie-consent-details <?= (!empty($visibleDetails)) ? 'show' : '' ?>">
                    <?php foreach ($consent as $key => $item) : ?>
                        <?php if (!empty($item['details'])) : ?>
                            <h5><?= $item["label"] ?></h5>
                            <table>
                                <?php foreach ($item['details'] as $detail) : ?>
                                    <?php if (!empty($detail['title']) && !empty($detail['description'])) : ?>
                                        <tr>
                                            <td><?= $detail['title'] ?></td>
                                            <td><?= $detail['description'] ?></td>
                                        </tr>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </table>
                        <?php endif ?>
                    <?php endforeach ?>
                </div>
                <button class="btn btn-outline-secondary btn-sm cookie-consent-details-toggle"><?= $detailsOpen ?></button>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary cookie-consent-accept-all"><?= $acceptAll ?></button>
                <button class="btn btn-secondary cookie-consent-accept-necessary"><?= $acceptNecessary ?></button>
            </div>
        </div>
    </div>
</div>