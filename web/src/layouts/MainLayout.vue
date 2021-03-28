<template>
<div>
  <b-navbar toggleable="lg" type="dark" variant="dark">
    <b-navbar-brand href="/">Car Management</b-navbar-brand>
    <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
    <b-collapse id="nav-collapse" is-nav>
      <b-navbar-nav>
        <b-nav-item href="/">Home</b-nav-item>
        <b-nav-item href="https://github.com/yusukeyu">Autor</b-nav-item>
      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
</div>
</template>

<script>
export default {
  name: 'TabIcons'
}
</script>

<style lang="scss" scoped>
  .md-tabs + .md-tabs {
    margin-top: 24px;
  }
  .navbar-dark .navbar-nav .nav-link {
     color: #f6f3f7;
}
.bg-dark{
  background-color:#1e1f26!important;
}
</style>
