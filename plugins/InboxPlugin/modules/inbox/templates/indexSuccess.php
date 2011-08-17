<?php use_helper("Date"); ?>
<?php use_javascript('/InboxPlugin/js/inbox.js') ?>
<div id="inboxContainer">
    <div class="inbox_left">
        <div class="main-content messages-main-content" style="min-height: 357px;">
            <div class="messages-header header">
                <h1><?php echo __('Menssages', null, 'inbox') ?></h1>
                <div class="new-message-button">
                    <a class="new-message button" rel="facebox" href="<?php echo sfConfig::get('app_base_url') ?>inbox/iframeFormMessage"><?php echo __('New Message', null, 'inbox') ?></a>
                </div>
            </div>
            <div class="stream-manager">
                <div><div class="stream-title"></div>
                    <div class="stream-container">
                        <?php if (!$sf_request->getParameter('messageID')) { ?>
                            <?php include_component('inbox', 'list'); ?> 
                        <?php } else { ?>
                            <?php include_component('inbox', 'list_one', array('messageID' => $sf_request->getParameter('messageID'))); ?>
                        <?php } ?>  

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="inbox_right">
    </div>
</div>
