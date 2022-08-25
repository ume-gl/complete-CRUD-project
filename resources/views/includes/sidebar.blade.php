
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        
        <span class="brand-text font-weight-light">Ume-Ruman</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            
            <div class="info">
                <a href="#" class="d-block">Categories</a>
                <ul>
                <a  href="{{route('categories.create')}}"> <li>Add Category</li></a>
                <a href="{{route('categories.index')}}"> <li>List Category</li></a>

                </ul>             
                <a href="#" class="d-block">Products</a>
                <ul>
                <a href="{{route('products.create')}}"> <li style="color: white" >Add Product</li></a>
                 <a href="{{route('products.index')}}"> <li>List Product</li></a>
                </ul>
                 <a href="profile" class="d-block">User Profile</a>
             
            </div>
        </div>


</aside>
</div>

</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->

</div>
