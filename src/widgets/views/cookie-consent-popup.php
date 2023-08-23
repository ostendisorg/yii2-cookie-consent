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
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><?= $title ?></h5>
            </div>
            <div class="modal-body">
                <p class="cookie-consent-message">
                    <span class="cookie-consent-text"><?= $message ?></span>
                    <?= Html::a($learnMore, $link, ['class' => 'cookie-consent-link']) ?>
                </p>

                <div class="cookie-consent-controls <?= (!empty($visibleControls)) ? 'open' : '' ?>">
                    <?php foreach ($consent as $key => $item) : ?>
                        <label for="<?= $key ?>" class="cookie-consent-control">
                            <?= Html::checkbox($key, $item["checked"], [
                                'class' => 'cookie-consent-checkbox',
                                'data-cc-consent' => $key,
                                'disabled' => $item["disabled"],
                                'id' => $key
                            ]) ?>
                            <span><?= $item["label"] ?></span>
                        </label>
                    <?php endforeach ?>

                </div>
                <div class="cookie-consent-details <?php if (!empty($visibleDetails)) : ?>open<?php endif; ?>">
                    <?php foreach ($consent as $key => $item) : ?>
                        <?php if (!empty($item['details'])) : ?>
                            <label><?= $item["label"] ?></label>
                            <table>
                                <?php foreach ($item['details'] as $detail) : ?>
                                    <?php if (!empty($detail['title']) && !empty($detail['description'])) : ?>
                                        <tr>
                                            <td><?= $detail['title'] ?></td>
                                            <td><?= $detail['description'] ?></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach ?>
                            </table>
                        <?php endif; ?>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary cookie-consent-accept-all"><?= $acceptAll ?></button>
                <button class="btn btn-secondary cookie-consent-deny-all"><?= $denyAll ?></button>
                <button class="btn btn-outline-secondary cookie-consent-details-toggle"><?= $detailsOpen ?></button>
            </div>
        </div>
    </div>
</div>