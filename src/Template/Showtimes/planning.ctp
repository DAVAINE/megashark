<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $showtimes
 */
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Showtimes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('New Showtime'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?></li>
    </ul>
</nav>

<div class="showtimes index large-9 medium-8 columns content">
    <h3><?= __('Planning') ?></h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <?php
            echo $this->Form->control('room_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    
    <?php 
        $dayNames = ['Monday', 'Tuesday', 'Wednesday', 'Thurday', 'Friday', 'Saturday', 'Sunday'];
    ?>
    
    <?php for($i=1; $i<=7; $i++): ?>
    <table cellpadding="0" cellspacing="0" style="width: 14.2%; float: left;">
        <?php (isset($showtimesPerDay[$i]) ? $day = $showtimesPerDay[$i] : $day = null); ?>
        <tr>
            <th scope="col"><?= __($dayNames[$i-1]) ?></th>
        </tr>
        
        <?php if($day != null): ?>
            <?php foreach ($day as $showtime): ?>
            <tr>
            
                <td>
                    <span>
                        <?= h($showtime->movie->name) ?>
                    </span>
                    <span>
                        <?= h($showtime->start->format('H:i')) ?> - <?= h($showtime->end->format('H:i')) ?>
                    </span>
                </td>
                
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
    <?php endfor; ?>
</div>