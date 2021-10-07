<?php $__env->startSection('content'); ?>
    <?php if(isset($paginate) && !empty($paginate->getTotal()) > 0): ?>
        <?php foreach($paginate->getItems() as $k => $item): ?>
            <p>
                <?php echom($item,'name',1); ?>
            </p>
            <p>
                <?php echom($item,'slug',1); ?>
            </p>
            <p>
                <?php echom($item,'act',1); ?>
            </p>
        <?php endforeach; ?>
        <?php  echo $this->CI->pagination->create_links(); ?>
    <?php else: ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("index", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>