<?php $__env->startPush('css'); ?>
    <style>
        .alertcart {
            background-color: red !important;
        }
    </style>
    <script type="text/javascript">
        window.onload = function() {

            var options = {
                exportEnabled: true,
                animationEnabled: true,
                title: {
                    text: "<?php echo e(get_setting('site_name')->value ?? ''); ?>"
                },
                legend: {
                    horizontalAlign: "right",
                    verticalAlign: "center"
                },
                data: [{
                    type: "pie",
                    showInLegend: true,
                    toolTipContent: "<b>{name}</b>: {y} (#percent)",
                    indexLabel: "{name}",
                    legendText: "{name} (#percent)",
                    indexLabelPlacement: "inside",
                    dataPoints: [{
                            y: 6,
                            name: "Pending"
                        },
                        {
                            y: 9,
                            name: "Prossecing"
                        },
                        {
                            y: 10,
                            name: "Delivery"
                        },
                        {
                            y: 12,
                            name: "Sales"
                        },
                        {
                            y: 5,
                            name: "Others"
                        },
                        {
                            y: 6,
                            name: "Utilities"
                        }
                    ]
                }]
            };
            $("#chartContainer").CanvasJSChart(options);

        }
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('admin'); ?>
    <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Dashboard</h2>
                <p>Whole data about your business here</p>
            </div>
            <div>
                <a href="<?php echo e(route('pos.index')); ?>" class="btn btn-primary"><i
                        class="text-muted material-icons md-post_add"></i>Pos</a>
            </div>
        </div>
        <div class="row shoppers__even">
            <?php if(Auth::guard('admin')->user()->role == '1'): ?>
                <div class="col-lg-3">
                    <div class="card card-body mb-4">
                        <article class="icontext">
                            <span class="icon icon-sm rounded-circle bg-primary-light"><i
                                    class="text-primary material-icons md-monetization_on"></i></span>
                            <div class="text">
                                <h6 class="mb-1 card-title">Website Revenue</h6>
                                <span>৳ <?php echo e(number_format($WebOrderCount->total_sell, 2)); ?></span>
                                <span class="text-sm"> Website Orders
                                    <?php echo e(number_format($WebOrderCount->total_orders)); ?></span>
                            </div>
                        </article>
                    </div>
                </div>
            <?php endif; ?>
            
            <?php if(Auth::guard('admin')->user()->role == '1'): ?>
                <div class="col-lg-3">
                    <div class="card card-body mb-4">
                        <article class="icontext">
                            <span class="icon icon-sm rounded-circle bg-primary-light"><i
                                    class="text-primary material-icons md-monetization_on"></i></span>
                            <div class="text">
                                <h6 class="mb-1 card-title">Pos Revenue</h6>
                                <span>৳ <?php echo e(number_format($PosorderCount->total_sell, 2)); ?></span>
                                <span class="text-sm"> Pos Orders <?php echo e(number_format($PosorderCount->total_orders)); ?></span>
                            </div>
                        </article>
                    </div>
                </div>
            <?php endif; ?>
            
            <?php if(Auth::guard('admin')->user()->role == '1'): ?>
                <div class="col-lg-3">
                    <div class="card card-body mb-4">
                        <article class="icontext">
                            <span class="icon icon-sm rounded-circle bg-success-light"><i
                                    class="text-success material-icons md-local_shipping"></i></span>
                            <div class="text">
                                <h6 class="mb-1 card-title">Total of Revenue</h6>
                                <span><?php echo e(number_format($AllOrderCount->total_sell, 2)); ?></span>
                                <span class="text-sm"> Shipping fees are not included </span>
                            </div>
                        </article>
                    </div>
                </div>
            <?php endif; ?>
            
            <?php if(Auth::guard('admin')->user()->role == '1'): ?>
                <div class="col-lg-3">
                    <div class="card card-body mb-4">
                        <article class="icontext">
                            <span class="icon icon-sm rounded-circle bg-success-light"><i
                                    class="text-success material-icons md-local_shipping"></i></span>
                            <div class="text">
                                <h6 class="mb-1 card-title"> Total of Orders</h6>
                                <span><?php echo e(number_format($AllOrderCount->total_orders)); ?></span>
                                <span class="text-sm"> Excluding orders in transit </span>
                            </div>
                        </article>
                    </div>
                </div>
            <?php elseif(Auth::guard('admin')->user()->role == '5'): ?>
                <div class="col-lg-3">
                    <div class="card card-body mb-4">
                        <article class="icontext">
                            <span class="icon icon-sm rounded-circle bg-success-light"><i
                                    class="text-success material-icons md-local_shipping"></i></span>
                            <div class="text">
                                <h6 class="mb-1 card-title"> Total of Orders</h6>
                                <span><?php echo e(number_format($staffOrderCount->total_orders)); ?></span>
                                <span class="text-sm"> Excluding orders in transit </span>
                            </div>
                        </article>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="row shoppers__odd">
            <?php if(Auth::guard('admin')->user()->role != '2'): ?>
                <div class="col-lg-3">
                    <a href="<?php echo e(route('online.user.list')); ?>" style="cursor:pointer">
                        <div class="card card-body mb-4">
                            <article class="icontext">
                                <span class="icon icon-sm rounded-circle bg-info-light"><i
                                        class="text-info material-icons md-people"></i></span>
                                <div class="text">
                                    <h6 class="mb-1 card-title">Users</h6>
                                    <span><?php echo e(number_format($userCount->total_users)); ?></span>
                                    <span class="text-sm"> Who are active </span>
                                </div>
                            </article>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="<?php echo e(route('customer.index')); ?>" style="cursor:pointer">
                        <div class="card card-body mb-4">
                            <article class="icontext">
                                <span class="icon icon-sm rounded-circle bg-info-light"><i
                                        class="text-info material-icons md-people"></i></span>
                                <div class="text">
                                    <h6 class="mb-1 card-title">Customers</h6>
                                    <span><?php echo e(number_format($customerCount->total_users)); ?></span>
                                    <span class="text-sm"> Who are active </span>
                                </div>
                            </article>
                        </div>
                    </a>
                </div>
            <?php endif; ?>
            <?php if(Auth::guard('admin')->user()->role == '1'): ?>
                <div class="col-lg-3">
                    <a href="<?php echo e(route('writer.index')); ?>" style="cursor:pointer">
                        <div class="card card-body mb-4">
                            <article class="icontext">
                                <span class="icon icon-sm rounded-circle bg-info-light"><i
                                        class="text-info material-icons md-verified"></i></span>
                                <div class="text">
                                    <h6 class="mb-1 card-title">Writers</h6>
                                    <span><?php echo e(number_format($vendorCount->total_vendors)); ?></span>
                                    <span class="text-sm"> Who are writing books here. </span>
                                </div>
                            </article>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="<?php echo e(route('staff.index')); ?>" style="cursor:pointer">
                        <div class="card card-body mb-4">
                            <article class="icontext">
                                <span class="icon icon-sm rounded-circle bg-info-light"><i
                                        class="text-info material-icons md-verified"></i></span>
                                <div class="text">
                                    <h6 class="mb-1 card-title">Staffs</h6>
                                    <span><?php echo e(number_format($staffCount->total_users)); ?></span>
                                    <span class="text-sm"> Who are working here. </span>
                                </div>
                            </article>
                        </div>
                    </a>
                </div>
            <?php endif; ?>
        </div>
        <div class="row shoppers__even">
            <div class="col-lg-3">
                <a href="<?php echo e(route('product.all')); ?>" style="cursor:pointer">
                    <div class="card card-body mb-4">
                        <article class="icontext">
                            <span class="icon icon-sm rounded-circle bg-warning-light"><i
                                    class="text-warning material-icons md-qr_code"></i></span>
                            <div class="text">
                                <h6 class="mb-1 card-title">Products</h6>
                                <span><?php echo e(number_format($productCount->total_products)); ?></span>
                                <span class="text-sm"> In <?php echo e(number_format($categoryCount->total_categories)); ?> Categories
                                </span>
                            </div>
                        </article>
                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="<?php echo e(route('brand.all')); ?>" style="cursor:pointer">
                    <div class="card card-body mb-4">
                        <article class="icontext">
                            <span class="icon icon-sm rounded-circle bg-warning-light"><i
                                    class="text-warning material-icons md-local_police"></i></span>
                            <div class="text">
                                <h6 class="mb-1 card-title">Brands</h6>
                                <span><?php echo e(number_format($brandCount->total_brands)); ?></span>
                                <span class="text-sm"> All brands </span>
                            </div>
                        </article>
                    </div>
                </a>
            </div>
            
            
            <?php if(Auth::guard('admin')->user()->role == '2'): ?>
            <div class="col-lg-3">
                <div class="card card-body mb-4">
                    <article class="icontext">
                        <span class="icon icon-sm rounded-circle bg-warning-light"><i class="text-warning material-icons md-local_police"></i></span>
                        <div class="text">
                            <h6 class="mb-1 card-title">Withdraw Amount</h6>
                            <span><?php echo e($withdraw_ammount); ?>TK</span>
                            <span class="text-sm">All Withdraw Amount from order</span>
                        </div>
                    </article>
                </div>
            </div>
            <?php endif; ?>
        
        
            <?php if(Auth::guard('admin')->user()->role != '2'): ?>
                <div class="col-lg-3">
                    <div class="card card-body mb-4">
                        <article class="icontext">
                            <span class="icon icon-sm rounded-circle bg-danger"><i
                                    class="material-icons md-qr_code"></i></span>
                            <div class="text">
                                <h6 class="mb-1 card-title">Total Stocks</h6>
                                <span><?php echo e(number_format($StockCount->stock_qty)); ?></span>
                                <span class="text-sm"> Products having stock </span>
                            </div>
                        </article>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col-lg-3">
                <div class="card card-body mb-4  <?php if($countLowProducts > 0): ?> alertcart <?php endif; ?>"
                    data-bs-toggle="modal" data-bs-target="#lowstockModal" style="cursor: pointer">
                    <article class="icontext">
                        <span class="icon icon-sm rounded-circle bg-danger"><i
                                class="material-icons md-qr_code"></i></span>
                        <div class="text">
                            <h6 class="mb-1 card-title">Low Stocks</h6>
                            <span><?php echo e(number_format($countLowProducts)); ?></span>
                            <span class="text-sm"> Products having low stock </span>
                        </div>
                    </article>
                </div>
            </div>
        </div>

        <?php if(Auth::guard('admin')->user()->role == '1'): ?>
            <div class="row shoppers__odd">
                <div class="col-lg-3">
                    <div class="card card-body mb-4">
                        <article class="icontext">
                            <span class="icon icon-sm rounded-circle bg-warning-light"><i
                                    class="text-warning material-icons md-local_police"></i></span>
                            <div class="text">
                                <h6 class="mb-1 card-title">Website Today Sale</h6>
                                <span><?php echo e(number_format($WebOrderToday->total_sell)); ?></span>
                                <span class="text-sm"> Today Sale Count :
                                    <?php echo e(number_format($WebOrderToday->total_orders)); ?></span>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card card-body mb-4">
                        <article class="icontext">
                            <span class="icon icon-sm rounded-circle bg-warning-light"><i
                                    class="text-warning material-icons md-local_police"></i></span>
                            <div class="text">
                                <h6 class="mb-1 card-title">Website This Month Sale</h6>
                                <span><?php echo e(number_format($WebOrderThisMonth->total_sell)); ?></span>
                                <span class="text-sm"> This Month Sale Count :
                                    <?php echo e(number_format($WebOrderThisMonth->total_orders)); ?></span>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card card-body mb-4">
                        <article class="icontext">
                            <span class="icon icon-sm rounded-circle bg-warning-light"><i
                                    class="text-warning material-icons md-local_police"></i></span>
                            <div class="text">
                                <h6 class="mb-1 card-title">Website Last Month Sale</h6>
                                <span><?php echo e(number_format($WebOrderPreviousMonth->total_sell)); ?></span>
                                <span class="text-sm"> Last Month Sale Count :
                                    <?php echo e(number_format($WebOrderPreviousMonth->total_orders)); ?></span>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card card-body mb-4">
                        <article class="icontext">
                            <span class="icon icon-sm rounded-circle bg-warning-light"><i
                                    class="text-warning material-icons md-local_police"></i></span>
                            <div class="text">
                                <h6 class="mb-1 card-title">Website This Year Sale</h6>
                                <span><?php echo e(number_format($WebOrderThisYear->total_sell)); ?></span>
                                <span class="text-sm"> This Year Sale Count :
                                    <?php echo e(number_format($WebOrderThisYear->total_orders)); ?></span>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
            <div class="row shoppers__even">
                <div class="col-lg-3">
                    <div class="card card-body mb-4">
                        <article class="icontext">
                            <span class="icon icon-sm rounded-circle bg-warning-light"><i
                                    class="text-warning material-icons md-local_police"></i></span>
                            <div class="text">
                                <h6 class="mb-1 card-title">Website Today Profit</h6>
                                <span><?php echo e(number_format($WebOrderToday->total_sell - $Webbuytoday->total_buy)); ?></span>
                                <span class="text-sm"> Today profit by Sale Count :
                                    <?php echo e(number_format($Webbuytoday->total_orders)); ?></span>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card card-body mb-4">
                        <article class="icontext">
                            <span class="icon icon-sm rounded-circle bg-warning-light"><i
                                    class="text-warning material-icons md-local_police"></i></span>
                            <div class="text">
                                <h6 class="mb-1 card-title">Website This Month Profit</h6>
                                <span><?php echo e(number_format($WebOrderThisMonth->total_sell - $WebbuyThisMonth->total_buy)); ?></span>
                                <span class="text-sm"> This Month profit by Sale Count :
                                    <?php echo e(number_format($WebbuyThisMonth->total_orders)); ?></span>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card card-body mb-4">
                        <article class="icontext">
                            <span class="icon icon-sm rounded-circle bg-warning-light"><i
                                    class="text-warning material-icons md-local_police"></i></span>
                            <div class="text">
                                <h6 class="mb-1 card-title">Website Last Month Profit</h6>
                                <span><?php echo e(number_format($WebOrderPreviousMonth->total_sell - $WebbuyPreviousMonth->total_buy)); ?></span>
                                <span class="text-sm"> Last Month profit by Sale Count :
                                    <?php echo e(number_format($WebbuyPreviousMonth->total_orders)); ?></span>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card card-body mb-4">
                        <article class="icontext">
                            <span class="icon icon-sm rounded-circle bg-warning-light"><i
                                    class="text-warning material-icons md-local_police"></i></span>
                            <div class="text">
                                <h6 class="mb-1 card-title">Website This Year Profit</h6>
                                <span><?php echo e(number_format($WebOrderThisYear->total_sell - $WebbuyThisYear->total_buy)); ?></span>
                                <span class="text-sm"> This Year profit by Sale Count :
                                    <?php echo e(number_format($WebbuyThisYear->total_orders)); ?></span>
                            </div>
                        </article>
                    </div>
                </div>
            </div>

            <div class="row shoppers__odd">
                <div class="col-lg-3">
                    <div class="card card-body mb-4">
                        <article class="icontext">
                            <span class="icon icon-sm rounded-circle bg-warning-light"><i
                                    class="text-warning material-icons md-local_police"></i></span>
                            <div class="text">
                                <h6 class="mb-1 card-title">Pos Today Sale</h6>
                                <span><?php echo e(number_format($PosOrderToday->total_sell)); ?></span>
                                <span class="text-sm"> Today Sale Count :
                                    <?php echo e(number_format($PosOrderToday->total_orders)); ?></span>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card card-body mb-4">
                        <article class="icontext">
                            <span class="icon icon-sm rounded-circle bg-warning-light"><i
                                    class="text-warning material-icons md-local_police"></i></span>
                            <div class="text">
                                <h6 class="mb-1 card-title">Pos This Month Sale</h6>
                                <span><?php echo e(number_format($PosOrderThisMonth->total_sell)); ?></span>
                                <span class="text-sm"> This Month Sale Count :
                                    <?php echo e(number_format($PosOrderThisMonth->total_orders)); ?></span>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card card-body mb-4">
                        <article class="icontext">
                            <span class="icon icon-sm rounded-circle bg-warning-light"><i
                                    class="text-warning material-icons md-local_police"></i></span>
                            <div class="text">
                                <h6 class="mb-1 card-title">Pos Last Month Sale</h6>
                                <span><?php echo e(number_format($PosOrderPreviousMonth->total_sell)); ?></span>
                                <span class="text-sm"> Last Month Sale Count :
                                    <?php echo e(number_format($PosOrderPreviousMonth->total_orders)); ?></span>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card card-body mb-4">
                        <article class="icontext">
                            <span class="icon icon-sm rounded-circle bg-warning-light"><i
                                    class="text-warning material-icons md-local_police"></i></span>
                            <div class="text">
                                <h6 class="mb-1 card-title">Pos This Year Sale</h6>
                                <span><?php echo e(number_format($PosOrderThisYear->total_sell)); ?></span>
                                <span class="text-sm"> This Year Sale Count :
                                    <?php echo e(number_format($PosOrderThisYear->total_orders)); ?></span>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
            <div class="row shoppers__even">
                <div class="col-lg-3">
                    <div class="card card-body mb-4">
                        <article class="icontext">
                            <span class="icon icon-sm rounded-circle bg-warning-light"><i
                                    class="text-warning material-icons md-local_police"></i></span>
                            <div class="text">
                                <h6 class="mb-1 card-title">Pos Profit Today </h6>
                                <span><?php echo e(number_format($PosOrderToday->total_sell - $PosbuyToday->total_buy)); ?></span>
                                <span class="text-sm"> Today Profit of Sale Count :
                                    <?php echo e(number_format($PosbuyToday->total_orders)); ?></span>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card card-body mb-4">
                        <article class="icontext">
                            <span class="icon icon-sm rounded-circle bg-warning-light"><i
                                    class="text-warning material-icons md-local_police"></i></span>
                            <div class="text">
                                <h6 class="mb-1 card-title">Pos Profit This Month </h6>
                                <span><?php echo e(number_format($PosOrderThisMonth->total_sell - $PosbuyThisMonth->total_buy)); ?></span>
                                <span class="text-sm"> This Month Profit of Sale Count :
                                    <?php echo e(number_format($PosbuyThisMonth->total_orders)); ?></span>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card card-body mb-4">
                        <article class="icontext">
                            <span class="icon icon-sm rounded-circle bg-warning-light"><i
                                    class="text-warning material-icons md-local_police"></i></span>
                            <div class="text">
                                <h6 class="mb-1 card-title">Pos Profit Last Month </h6>
                                <span><?php echo e(number_format($PosOrderPreviousMonth->total_sell - $PosbuyPreviousMonth->total_buy)); ?></span>
                                <span class="text-sm">Last Month Profit of Sale Count :
                                    <?php echo e(number_format($PosbuyPreviousMonth->total_orders)); ?></span>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card card-body mb-4">
                        <article class="icontext">
                            <span class="icon icon-sm rounded-circle bg-warning-light"><i
                                    class="text-warning material-icons md-local_police"></i></span>
                            <div class="text">
                                <h6 class="mb-1 card-title">Pos Profit This Year </h6>
                                <span><?php echo e(number_format($PosOrderThisYear->total_sell - $PosbuyThisYear->total_buy)); ?></span>
                                <span class="text-sm"> This Year Profit of Sale Count :
                                    <?php echo e(number_format($PosbuyThisYear->total_orders)); ?></span>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <div class="card mb-4">
            <header class="card-header">
                <h2 class="text-white">All History</h2>
            </header>
            <div class="card-body">
                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
            </div>
        </div>

    </section>

    <!-- Modal -->
    <div class="modal fade" id="lowstockModal" tabindex="-1" aria-labelledby="lowstockModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lowstockModalLabel">Product Low Stock List</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive-sm p-4">
                        <table class="table table-bordered  table-hover table-striped" id="example" width="100%"
                            style="border:1px solid #ddd">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product Name</th>
                                    <th>Low Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th><?php echo e($key + 1); ?></th>
                                        <th><?php echo e($product->name_en); ?></th>
                                        <th><?php echo e($product->low_qty); ?></th>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/home2/boibaariclassici/public_html/resources/views/admin/index.blade.php ENDPATH**/ ?>