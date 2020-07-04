<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Buyers'), ['controller' => 'Buyers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Buyer'), ['controller' => 'Buyers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Restaurants'), ['controller' => 'Restaurants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Restaurant'), ['controller' => 'Restaurants', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $user->has('role') ? $this->Html->link($user->role->id, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Buyers') ?></h4>
        <?php if (!empty($user->buyers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Names') ?></th>
                <th scope="col"><?= __('Phones') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Images') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->buyers as $buyers): ?>
            <tr>
                <td><?= h($buyers->id) ?></td>
                <td><?= h($buyers->names) ?></td>
                <td><?= h($buyers->phones) ?></td>
                <td><?= h($buyers->email) ?></td>
                <td><?= h($buyers->images) ?></td>
                <td><?= h($buyers->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Buyers', 'action' => 'view', $buyers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Buyers', 'action' => 'edit', $buyers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Buyers', 'action' => 'delete', $buyers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $buyers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Restaurants') ?></h4>
        <?php if (!empty($user->restaurants)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Names') ?></th>
                <th scope="col"><?= __('Location') ?></th>
                <th scope="col"><?= __('Opentime') ?></th>
                <th scope="col"><?= __('Closetime') ?></th>
                <th scope="col"><?= __('Closed') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->restaurants as $restaurants): ?>
            <tr>
                <td><?= h($restaurants->id) ?></td>
                <td><?= h($restaurants->names) ?></td>
                <td><?= h($restaurants->location) ?></td>
                <td><?= h($restaurants->opentime) ?></td>
                <td><?= h($restaurants->closetime) ?></td>
                <td><?= h($restaurants->closed) ?></td>
                <td><?= h($restaurants->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Restaurants', 'action' => 'view', $restaurants->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Restaurants', 'action' => 'edit', $restaurants->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Restaurants', 'action' => 'delete', $restaurants->id], ['confirm' => __('Are you sure you want to delete # {0}?', $restaurants->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
