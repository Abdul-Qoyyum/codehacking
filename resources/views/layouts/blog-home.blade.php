<!DOCTYPE html>
<html lang="en">
 @include('includes.front_header')
    <!-- Navigation -->
    @include('includes.front_top_nav')

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
             @yield('content')
            </div>

        <!-- Blog Sidebar Widgets Column -->
     @include('includes.front_side_nav')
 <!-- footer section -->
 @include('includes.front_footer')
