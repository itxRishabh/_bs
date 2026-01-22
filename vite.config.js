import { defineConfig } from 'vite';
import { resolve } from 'path';
import { glob } from 'glob';

export default defineConfig({
  root: 'src',
  base: './',
  
  build: {
    outDir: '../dist',
    emptyOutDir: true,
    manifest: true,
    rollupOptions: {
      input: {
        main: resolve(__dirname, 'src/js/main.js'),
        navigation: resolve(__dirname, 'src/js/navigation.js'),
        style: resolve(__dirname, 'src/scss/main.scss'),
      },
      output: {
        entryFileNames: 'js/[name].js',
        chunkFileNames: 'js/[name]-[hash].js',
        assetFileNames: (assetInfo) => {
          if (assetInfo.name.endsWith('.css')) {
            return 'css/[name][extname]';
          }
          if (/\.(woff2?|ttf|eot|otf)$/i.test(assetInfo.name)) {
            return 'fonts/[name][extname]';
          }
          return 'assets/[name][extname]';
        },
      },
    },
    cssCodeSplit: false,
    sourcemap: true,
  },

  css: {
    preprocessorOptions: {
      scss: {
        additionalData: `@use "variables" as *;`,
        includePaths: [resolve(__dirname, 'src/scss')],
      },
    },
    devSourcemap: true,
  },

  server: {
    port: 3000,
    strictPort: true,
    cors: true,
    origin: 'http://localhost:3000',
  },

  resolve: {
    alias: {
      '~bootstrap': resolve(__dirname, 'node_modules/bootstrap'),
      '~bootstrap-icons': resolve(__dirname, 'node_modules/bootstrap-icons'),
    },
  },
});
