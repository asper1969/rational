<div class="main-content">
    <?php if ($show_messages) { print $messages; }; ?>
    <?php if ($title): ?>
        <h1 class="title" id="page-title">
            <?php print $title; ?>
        </h1>
    <?php endif; ?>
    <?php if ($tabs): ?>
        <div class="tabs">
            <?php print render($tabs); ?>
        </div>
    <?php endif; ?>
    <?php if ($action_links): ?>
        <ul class="action-links">
            <?php print render($action_links); ?>
        </ul>
    <?php endif; ?>
    <?php if ($page['content']): ?>
        <div class="content-section">
            <?php print render($page['content']); ?>
        </div>
    <?php endif; ?>
</div>

