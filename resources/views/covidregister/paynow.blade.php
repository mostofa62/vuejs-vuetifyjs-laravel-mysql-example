@extends('layouts/app')
@section('content')
<div id="app">
<v-app>
<v-container      
      class="grey lighten-5 mb-6"
    >
      <v-row>

            <v-col
              cols="12"
              sm="6"
              md="12"
            >
            <h1>IEDCR - PAYMENT PAGE</h1>
          </v-col>
      </v-row>
      <v-row        
        style="height: 150px;"
      >
        <v-col
          cols="12"
          md="12"
        >
          <v-card
            class="pa-1"
            outlined
            tile
          >
            Paynow Page
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-app>
</div>
@push('scripts')
<script>
  new Vue({
      el: '#app',
      vuetify: new Vuetify(),
      data: () => ({
      alignments: [
        'start',
        'center',
        'end',
      ],
      }),


  })
</script>

@endpush

@stop