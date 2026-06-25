<div class="sidebar-wrapper sidebar-wrapper-mrg-right">
    <div class="sidebar-widget mb-40">
        <h4 class="sidebar-widget-title">Search </h4>
        <div class="sidebar-search">
            <form class="sidebar-search-form" action="#">
                <input type="text" placeholder="Search here...">
                <button>
                    <i class="icon-magnifier"></i>
                </button>
            </form>
        </div>
    </div>
    <div class="sidebar-widget shop-sidebar-border mb-35 pt-40">
        <h4 class="sidebar-widget-title">Categories </h4>
        <div class="shop-catigory">
            <ul>
                <?php
                if (!empty($categories)) {
                    foreach ($categories['data'] as $category) {
                ?>
                    <li><a href="<?= BASE_URL ?>category/<?= $category['slug'] ?>"><?= $category['name'] ?></a></li>
                <?php
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</div>