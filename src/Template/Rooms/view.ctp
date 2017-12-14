<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Room $room
 * @var \Cake\Datasource\EntityInterface $room
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Room'), ['action' => 'edit', $room->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Room'), ['action' => 'delete', $room->id], ['confirm' => __('Are you sure you want to delete # {0}?', $room->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rooms'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Room'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Movies'), ['controller' => 'Movies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Showtimes'), ['controller' => 'Showtimes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Showtime'), ['controller' => 'Showtimes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Planning'), ['action' => 'Planning']) ?></li>
    </ul>
</nav>
<div class="rooms view large-9 medium-8 columns content">
    <h3><?= h($room->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($room->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($room->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Capacity') ?></th>
            <td><?= $this->Number->format($room->capacity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($room->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($room->modified) ?></td>
        </tr>
    </table>
    <div>
        <h4><?= __('Showtimes') ?></h4>
        <?php 
            $dayNames = ['Monday', 'Tuesday', 'Wednesday', 'Thurday', 'Friday', 'Saturday', 'Sunday'];
        ?>
        <?php for($i=1; $i<=7; $i++): ?>
        <table cellpadding="0" cellspacing="0" style="width: 14.2%;float: left;">
            <?php (isset($showtimesPerDay[$i]) ? $day = $showtimesPerDay[$i] : $day = null); ?>
            <tr>
                <th scope="col"><?= __($dayNames[$i-1]) ?></th>
             </tr>
            <?php if($day != null): ?>
                <?php foreach ($day as $showtime): ?>
                <tr>
                    <td>
                        <span><?= h($showtime->movie->name) ?></span>
                        
                        <span><?= h($showtime->start->format('H:i')) ?> - <?= h($showtime->end->format('H:i')) ?></span>
                    </td>
                <?php endforeach; ?>
            <?php endif; ?>
         </table>
        <?php endfor; ?>
    </div>
</div>