<?php $__env->startSection('content'); ?>
    <div class="container mt-32 mx-auto p-4 md:p-0">
        <input type="hidden" id="product_attribute" value="<?php echo e($product->attributes); ?>">

        <div class="shadow-lg flex flex-wrap w-full lg:w-4/5 mx-auto">

            <div class="bg-cover bg-bottom border w-full md:w-1/3 h-64 md:h-auto relative" style="background-image:url('<?php echo e(asset('images/products/'. $product->photo)); ?>')">
                <div class="absolute text-xl">
                    <i class="fa fa-heart text-white hover:text-red-light ml-4 mt-4 cursor-pointer"></i>
                </div>
            </div>
            <div class="bg-white w-full md:w-2/3">
                <div class="h-full mx-auto px-6 md:px-0 md:pt-6 md:-ml-6 relative">
                    <div class="bg-white lg:h-full p-6 -mt-6 md:mt-0 relative mb-4 md:mb-0 items-center">
                        <div class="w-full lg:border-right lg:border-solid text-center md:text-left">
                            <h3 class="text-6xl"><?php echo e($product->name); ?></h3>
                        </div>
                        <div class="w-full  lg:px-3">
                            <p class="text-md mt-4 lg:mt-0 text-justify md:text-left text-sm">
                                <?php echo e($product->description); ?>

                            </p>
                        </div>
                        <div id="product_color" class="flex">



                        </div>
                        <div id="price"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $( document ).ready(function() {
            var attribute_data = JSON.parse($("#product_attribute").val())
            console.log(attribute_data);
            jQuery.each(attribute_data, function( i, val ) {
                $( "#product_color" ).append(
                    '<div  price="'+val.price+'" class="mr-1 color_chack" style="width:20px; height: 20px; background-color: '+val.color+'"></div>'
                )
            })
            $("#price").html(attribute_data[0].price)
            $(document).on('click', '.color_chack', function() {
                console.log($(this).attr("price"));
                $("#price").html($(this).attr("price"))
                // if($("#user_role").val() == 1){
                //     $( '#' + $(this).attr("delete_id") ).remove()
                //     $(this).remove()
                //     attribute_array.splice(attribute_array.indexOf($(this).attr("delete_id")) , 1 );
                // }

            }) ;
            // $( "#product_color" ).append(
            //     '<div id="price">555</div>'
            // )
        })

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/lifebeget/resources/views/front/product_single.blade.php ENDPATH**/ ?>