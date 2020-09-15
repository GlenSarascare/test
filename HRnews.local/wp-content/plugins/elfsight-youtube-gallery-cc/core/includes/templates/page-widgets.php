<?php

if (!defined('ABSPATH')) exit;

?><article class="elfsight-admin-page-widgets elfsight-admin-page" data-elfsight-admin-page-id="widgets">
    <div class="elfsight-admin-page-heading">
        <h2><?php esc_html_e('Widgets', $this->textDomain); ?></h2>

        <a class="elfsight-admin-page-widgets-add-new elfsight-admin-button-green elfsight-admin-button" href="#/add-widget/" data-elfsight-admin-page="add-widget"><?php esc_html_e('Create widget', $this->textDomain); ?></a>

        <div class="elfsight-admin-page-heading-subheading"><?php esc_html_e('Create, edit or remove your widgets. Use their shortcodes to insert them into the required place.', $this->textDomain); ?></div>
    </div>

    <table class="elfsight-admin-page-widgets-list">
        <thead>
            <tr>
                <th><span><?php esc_html_e('Name', $this->textDomain); ?></span></th>
                <th><span><?php esc_html_e('Shortcode', $this->textDomain); ?></span></th>
                <th><span><?php esc_html_e('Last updated', $this->textDomain); ?></span></th>
                <th><span><?php esc_html_e('Actions', $this->textDomain); ?></span></th>
            </tr>
        </thead>

        <tbody></tbody>
    </table>

    <template class="elfsight-admin-template-widgets-list-item elfsight-admin-template">
        <tr class="elfsight-admin-page-widgets-list-item">
            <td class="elfsight-admin-page-widgets-list-item-name"><a href="#" data-elfsight-admin-page="edit-widget"></a></td>

            <td class="elfsight-admin-page-widgets-list-item-shortcode">
                <span class="elfsight-admin-page-widgets-list-item-shortcode-hidden"></span>

                <input type="text" class="elfsight-admin-page-widgets-list-item-shortcode-input" readonly></input>

                <span type="text" class="elfsight-admin-page-widgets-list-item-shortcode-value"></span>

                <div class="elfsight-admin-page-widgets-list-item-shortcode-copy">
                    <span class="elfsight-admin-page-widgets-list-item-shortcode-copy-trigger"><span>Copy</span></span>

                    <div class="elfsight-admin-page-widgets-list-item-shortcode-copy-error">Press Cmd+C to copy</div>
                </div>
            </td>

            <td class="elfsight-admin-page-widgets-list-item-date"></td>

            <td class="elfsight-admin-page-widgets-list-item-actions">
                <a href="#" class="elfsight-admin-page-widgets-list-item-actions-edit">
                    <svg width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <g id="edit">
                            <path d="M16.4931524,2.4765175 L16.6763274,2.53218654 C17.5787808,2.83961227 18.2745737,3.5779071 18.5234825,4.5068476 C18.7889853,5.49771747 18.5056972,6.55496302 17.7803301,7.28033009 L7.65533009,17.4053301 C7.56303836,17.4976218 7.44825923,17.5642307 7.32233805,17.5985729 L3.19733805,18.7235729 C2.63746387,18.8762658 2.12373417,18.3625361 2.27642713,17.8026619 L3.40142713,13.6776619 C3.43576927,13.5517408 3.50237819,13.4369616 3.59466991,13.3446699 L13.7196699,3.21966992 C14.3966792,2.54266063 15.3627915,2.25075127 16.2942114,2.43070254 L16.4931524,2.4765175 Z M6.73550672,16.2038331 L16.7196699,6.21966991 C17.0660996,5.87324021 17.2013958,5.36830793 17.0745938,4.89507616 C16.9477917,4.42184439 16.5781556,4.05220831 16.1049238,3.92540624 C15.6316921,3.79860417 15.1267598,3.93390038 14.7803301,4.28033009 L4.7961669,14.2644933 L4.06891446,16.9310855 L6.73550672,16.2038331 Z"></path>
                        </g>
                    </svg>

                    <span><?php esc_html_e('Edit', $this->textDomain); ?></span>
                </a>
                <a href="#" class="elfsight-admin-page-widgets-list-item-actions-duplicate">
                    <svg width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <g id="duplicate">
                            <path d="M15.890625,7.40625 C17.081489,7.40625 18.046875,8.37163601 18.046875,9.5625 L18.046875,15.890625 C18.046875,17.081489 17.081489,18.046875 15.890625,18.046875 L9.5625,18.046875 C8.37163601,18.046875 7.40625,17.081489 7.40625,15.890625 L7.40625,9.5625 C7.40625,8.37163601 8.37163601,7.40625 9.5625,7.40625 L15.890625,7.40625 Z M15.890625,8.90625 L9.5625,8.90625 C9.20006313,8.90625 8.90625,9.20006313 8.90625,9.5625 L8.90625,15.890625 C8.90625,16.2530619 9.20006313,16.546875 9.5625,16.546875 L15.890625,16.546875 C16.2530619,16.546875 16.546875,16.2530619 16.546875,15.890625 L16.546875,9.5625 C16.546875,9.20006313 16.2530619,8.90625 15.890625,8.90625 Z"></path>
                            <path d="M5.109375,11.390625 L4.40625,11.390625 C4.04381313,11.390625 3.75,11.0968119 3.75,10.734375 L3.75,4.40625 C3.75,4.04381313 4.04381313,3.75 4.40625,3.75 L10.734375,3.75 C11.0968119,3.75 11.390625,4.04381313 11.390625,4.40625 L11.390625,5.109375 C11.390625,5.52358856 11.7264114,5.859375 12.140625,5.859375 C12.5548386,5.859375 12.890625,5.52358856 12.890625,5.109375 L12.890625,4.40625 C12.890625,3.21538601 11.925239,2.25 10.734375,2.25 L4.40625,2.25 C3.21538601,2.25 2.25,3.21538601 2.25,4.40625 L2.25,10.734375 C2.25,11.925239 3.21538601,12.890625 4.40625,12.890625 L5.109375,12.890625 C5.52358856,12.890625 5.859375,12.5548386 5.859375,12.140625 C5.859375,11.7264114 5.52358856,11.390625 5.109375,11.390625 Z"></path>
                        </g>
                    </svg>

                    <span><?php esc_html_e('Duplicate', $this->textDomain); ?></span>
                </a>
                <a href="#" class="elfsight-admin-page-widgets-list-item-actions-remove">
                    <svg width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <g id="trash">
                            <path d="M3,5.75 L16.5,5.75 C16.9142136,5.75 17.25,5.41421356 17.25,5 C17.25,4.58578644 16.9142136,4.25 16.5,4.25 L3,4.25 C2.58578644,4.25 2.25,4.58578644 2.25,5 C2.25,5.41421356 2.58578644,5.75 3,5.75 Z"></path>
                            <path d="M15,4.25 C15.3796958,4.25 15.693491,4.53215388 15.7431534,4.89822944 L15.75,5 L15.75,15.5 C15.75,16.690864 14.8248384,17.6656449 13.6540488,17.7448092 L13.5,17.75 L6,17.75 C4.80913601,17.75 3.83435508,16.8248384 3.75519081,15.6540488 L3.75,15.5 L3.75,5 C3.75,4.58578644 4.08578644,4.25 4.5,4.25 C4.87969577,4.25 5.19349096,4.53215388 5.24315338,4.89822944 L5.25,5 L5.25,15.5 C5.25,15.8796958 5.53215388,16.193491 5.89822944,16.2431534 L6,16.25 L13.5,16.25 C13.8796958,16.25 14.193491,15.9678461 14.2431534,15.6017706 L14.25,15.5 L14.25,5 C14.25,4.58578644 14.5857864,4.25 15,4.25 Z M8.25,1.25 L11.25,1.25 C12.440864,1.25 13.4156449,2.17516159 13.4948092,3.34595119 L13.5,3.5 L13.5,5 C13.5,5.41421356 13.1642136,5.75 12.75,5.75 C12.3703042,5.75 12.056509,5.46784612 12.0068466,5.10177056 L12,5 L12,3.5 C12,3.12030423 11.7178461,2.80650904 11.3517706,2.75684662 L11.25,2.75 L8.25,2.75 C7.87030423,2.75 7.55650904,3.03215388 7.50684662,3.39822944 L7.5,3.5 L7.5,5 C7.5,5.41421356 7.16421356,5.75 6.75,5.75 C6.37030423,5.75 6.05650904,5.46784612 6.00684662,5.10177056 L6,5 L6,3.5 C6,2.30913601 6.92516159,1.33435508 8.09595119,1.25519081 L8.25,1.25 L11.25,1.25 L8.25,1.25 Z"></path>
                            <path d="M7.5,8.75 L7.5,13.25 C7.5,13.6642136 7.83578644,14 8.25,14 C8.66421356,14 9,13.6642136 9,13.25 L9,8.75 C9,8.33578644 8.66421356,8 8.25,8 C7.83578644,8 7.5,8.33578644 7.5,8.75 Z"></path>
                            <path d="M10.5,8.75 L10.5,13.25 C10.5,13.6642136 10.8357864,14 11.25,14 C11.6642136,14 12,13.6642136 12,13.25 L12,8.75 C12,8.33578644 11.6642136,8 11.25,8 C10.8357864,8 10.5,8.33578644 10.5,8.75 Z"></path>
                        </g>
                    </svg>

                    <span><?php esc_html_e('Remove', $this->textDomain); ?></span>
                </a>

                <span class="elfsight-admin-page-widgets-list-item-actions-restore">
                    <span class="elfsight-admin-page-widgets-list-item-actions-restore-label"><?php esc_html_e('The widget has been removed.', $this->textDomain); ?></span>
                    <a href="#"><?php esc_html_e('Restore it', $this->textDomain); ?></a>
                </span>
            </td>
        </tr>
    </template>

     <template class="elfsight-admin-template-widgets-list-empty elfsight-admin-template">
        <tr class="elfsight-admin-page-widgets-list-empty-item">
            <td class="elfsight-admin-page-widgets-list-empty-item-text" colspan="3">
                <?php esc_html_e('There is no any widget yet.', $this->textDomain); ?>
                <a href="#/add-widget/" data-elfsight-admin-page="add-widget"><?php esc_html_e('Create the first one.', $this->textDomain); ?></a>
            </td>
        </tr>
    </template>
</article>
