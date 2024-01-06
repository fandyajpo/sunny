<div class="h-screen border">
    <?php
    $currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    ?>

    <div class="w-72 sticky top-24 p-4">
        <a class="" href="/">
            <div class="h-12 flex items-center pl-4 border-b <?php echo ($currentPath == '/') ? 'bg-yellow-200' : 'bg-white'; ?>">Barang</div>
        </a>
        <a class="" href="/supplier">
            <div class="h-12 flex items-center pl-4 border-b <?php echo ($currentPath == '/supplier') ? 'bg-yellow-200' : 'bg-white'; ?>">Supplier</div>
        </a>
        <a class="" href="/audit">
            <div class="h-12 flex items-center pl-4 border-b <?php echo ($currentPath == '/audit') ? 'bg-yellow-200' : 'bg-white'; ?>">Changes Log</div>
        </a>
        <p class="bg-yellow-500 text-yellow-900 font-bold py-1 px-2 text-xs">MASTER DATA</p>
        <a class="" href="/category">
            <div class="h-12 flex items-center pl-4 border-b <?php echo ($currentPath == '/category') ? 'bg-yellow-200' : 'bg-white'; ?>">Category</div>
        </a>
    </div>
</div>

<script>
    // <a class="" href="/">
    //             <div class="h-12 flex items-center pl-4 border-b <?php echo ($currentPath == '/') ? 'bg-yellow-200' : 'bg-white'; ?>">Home</div>
    //         </a>
    //         <a class="" href="/user">
    //             <div class="h-12 flex items-center pl-4 border-b <?php echo ($currentPath == '/user') ? 'bg-yellow-200' : 'bg-white'; ?>">User</div>
    //         </a>
</script>