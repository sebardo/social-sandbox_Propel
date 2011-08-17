<?php  
        $i = new Criteria();
        $i->add(PubsPeer::DEST_USER_ID, $sf_user->getGuardUser()->getId());
        $i->add(PubsPeer::USER_ID, $sf_user->getGuardUser()->getId(), Criteria::ALT_NOT_EQUAL);
        $i->add(PubsPeer::IS_ACTIVE, false);
        $noti = count(PubsPeer::doSelect($i)); 
 ?>

<a rel="pubs" class="count-button" <?php if ($noti > 0)
    echo 'style="opacity:1"'; ?>  href="#">
       <?php echo image_tag(sfConfig::get('app_base_url').'PubsPlugin/images/pubs.png') ?>
    <span class="BoxCount" <?php if ($noti > 0)
           echo 'style="display:block"'; ?>>
        <span ><?php echo $noti ?></span>   
    </span>
</a>
<ul class="box" id="new-advices">
    <h2><a href="<?php echo sfConfig::get('app_base_url') ?>pubs" >Notifications <?php echo image_tag('/PubsPlugin/images/loading.gif')?></a></h2>
</ul>
