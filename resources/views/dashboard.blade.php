@extends('layouts.navigation')

@section('content')
  <header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
    </div>
  </header>
@endsection

<script type="text/javascript">
  var AppBridge = window['app-bridge'];
  var actions = AppBridge.actions;
  var TitleBar = actions.TitleBar;
  var Button = actions.Button;
  var Redirect = actions.Redirect;
  var titleBarOptions = {
      title: 'Welcome',
  };
  var myTitleBar = TitleBar.create(app, titleBarOptions);
</script>

