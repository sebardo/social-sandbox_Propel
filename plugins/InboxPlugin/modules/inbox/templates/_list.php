
 

<?php use_helper('Date') ?>
<?php use_javascript('/InboxPlugin/js/inboxRight.js') ?>
<?php
$arr = array();
foreach ($inbox as $message):
    $parentMessage = $message->getParentMessage($message->getRecordId());
    if ($message->getUserId() != $sf_user->getGuardUser()->getId()) {
        if (!in_array($parentMessage->getId(), $arr)) {
            $arr[] = $parentMessage->getId();
            ?>     
            <div id="<?php echo $message->getId() ?>" class="stream">
                <div class="stream-items">
                    <div data-item-type="message_thread" data-item-id="sastus" class="stream-item  focused-stream-item">
                        <div data-screen-name="sastus" class="message-thread-preview stream-item-content">
                            <div class="more">»</div>
                            <div class="message-inner">
                                <?php echo image_tag($message->getUser()->getImage(), 'width=32 class=thumb'); ?>
                                <span class="user-name"><strong><?php echo $message->getUser()->getUsername() ?></strong> <b class="full-name"><?php echo $message->getUser()->getName() ?></b></span>
                                <div class="message-content">
                                    <span class="created-at"><span class="_timestamp"><?php echo format_date($message->getCreatedAt(), "f") ?></span></span>
                                    <div class="message-count"><?php echo $message->getCountMessages($message->getRecordId()); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
endforeach;
?>
 

