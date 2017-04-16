<?php
/**
 * Created by PhpStorm.
 * User: Javkhlan.G
 * Date: 3/22/2017
 * Time: 12:30 PM
 */
?>
@extends('layouts.master')
@section('content')
    <div class="clearfix" style="height: 20px"></div>
    @include('templates.message-block')
    <seciton class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What do you have to say?</h3></header>
            <form action="{{route('post.create')}}" method="post" enctype="multipart/form-data"  >
                <div class="form-group">
                    <textarea name="body" id="body" class="form-control" rows="2"></textarea>
                </div>
                <div class="col-md-6">
                    <input type="file" name="excel">
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary pull-right">Create Post</button>
                </div>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>
    </seciton>
    <section class="row posts">
        <div class="com-md-6 col-md-offset-3">
            <header><h3>What other people say ...</h3></header>
            @foreach($posts as $post)
                <article class="post" data-postid="{{$post->id}}">
                    <p> {{$post->body}} </p>
                    <div class="info">
                        Posted by {{$post->user->name}} at {{$post->created_at}}
                    </div>
                    <div class="inteaction">
                        <a href="/uploads/{{$post->file}}">Download</a>
                        <a href="#" class="edit">Edit</a>
                        <a href="{{route('post.delete',['post_id'=>$post->id])}}">Delete</a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
    <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Post</h4>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <label for="post-body">Edit the post</label>
                            <textarea class="form-control" name="post-body" id="post-body" cols="30"
                                      rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script>
        var token = '{{Session::token()}}';
        var url = '{{route('edit')}}';
    </script>
@endsection