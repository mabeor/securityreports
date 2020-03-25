@extends('errors::minimal')

@section('title', __('Oops'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
