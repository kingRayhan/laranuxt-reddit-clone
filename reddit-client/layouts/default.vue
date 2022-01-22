<template>
  <div>
    <Navbar />

    <div class="container reddit-layout">
      <main class="reddit-layout__content">
        <Nuxt />
      </main>

      <aside class="reddit-layout__sidebar">
        <sidebar />
      </aside>
    </div>

    <app-footer />
  </div>
</template>
