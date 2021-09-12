@extends('layouts/app')
@section('content')

<div id="app">
    <v-app>
      <v-main>
      	<v-form ref="form"
    v-model="valid"
    lazy-validation>
        <v-container>
        	<v-row>

        		<v-col
		          cols="12"
		          sm="6"
		          md="12"
		        >
		        <h1>IEDCR - HOME SAMPLE COLLECTION</h1>
		    	</v-col>
        	</v-row>
        	<v-row>
        		<v-col
		          cols="12"
		          sm="6"
		          md="6"
		        >

		        <v-text-field
		        v-model="name"
	            label="Name"
	            :rules="name_rules"
	            placeholder="provide your name"
	            outlined	            	            
	          	>
	          		
	          	</v-text-field>

		    	</v-col>

        	</v-row>

        	<v-row>
        		<v-col
		          cols="12"
		          sm="6"
		          md="6"
		        >
	        	<v-text-field	            
	            v-model="age"
	            
	            label="Age"
	            :rules="age_rules"
	            placeholder="32"
	            outlined
	          	>
	          		
	          	</v-text-field>
          		</v-col>
          	</v-row>

          	<v-row>
        		<v-col
		          cols="12"
		          sm="6"
		          md="6"
		        >
		        	<v-radio-group
				      v-model="gender"
				      row
				      :rules="gender_rules"				      
				      label="Gender"
				      outlined
				    >
				      <v-radio
				      	v-for="(item, index) in genders"
				        :label="item"
				        :value="index"

				      ></v-radio>				      
				    </v-radio-group>
          		</v-col>
          	</v-row>

          	<v-row>
        		<v-col
		          cols="12"
		          sm="6"
		          md="6"
		        >

		        <v-text-field
		        v-model="mobile_no"
	            label="Mobile no"
	            :rules="mobile_no_rules"
	            placeholder="provide your Mobile no"
	            outlined	            	            
	          	>
	          		
	          	</v-text-field>

		    	</v-col>

        	</v-row>
          	


        	<v-row>
        		<v-col
		          cols="12"
		          sm="6"
		          md="6"
		        >

		        <v-select
		          v-model="thana"
		          :items="thanas"
		          item-text="name"
		          item-value="id"
		          label="Thana"		          
		          :rules="thana_rules"
		          outlined
		        >
		        	
		        </v-select>

		    	</v-col>

        	</v-row>


        	<v-row>
        		<v-col
		          cols="12"
		          sm="6"
		          md="6"
		        >

		        <v-textarea
		          outlined
		          v-model="address"
		          label="Address"
		          value=""
		          :rules="address_rules"
		        >
		        	
		        </v-textarea>

		    	</v-col>

        	</v-row>

        	<v-row>
        		<v-col
		          cols="12"
		          sm="6"
		          md="6"
		        >
		        	<v-radio-group
				      v-model="nid_bcn_both"
				      row
				      :rules="nid_bcn_both_rules"				      
				      label="NID /Birth Certificate No / Both"				      
				    >
				      <v-radio
				      	v-for="(item, index) in nid_bcn_boths"
				        :label="item"
				        :value="index"

				      ></v-radio>	
				      
				    </v-radio-group>
          		</v-col>
          	</v-row>


          	<v-row>
        		<v-col
		          cols="12"
		          sm="6"
		          md="6"
		        >

		        <v-text-field
		        v-model="nid"
	            label="NID"
	            placeholder="provide your NID"
	            :disabled="nid_bcn_both==null || nid_bcn_both==2"
	            :required="nid_bcn_both==1"
	            outlined	            
	          	>
	          		
	          	</v-text-field>

		    	</v-col>

        	</v-row>

        	<v-row>
        		<v-col
		          cols="12"
		          sm="6"
		          md="6"
		        >

		        <v-text-field
		        v-model="bcn"
	            label="Birth Certificate No"
	            placeholder="provide your Birth Certificate No"
	            :disabled="nid_bcn_both==null || nid_bcn_both==1"
	            :required="nid_bcn_both==2"
	            outlined	                      
	          	>
	          		
	          	</v-text-field>

		    	</v-col>

        	</v-row>

        	<v-row>
        		<v-col
		          cols="12"
		          sm="6"
		          md="12"
		        >
		        	       	
			        <v-checkbox	
			          v-model="symptom"	              
		              v-for="(item, index) in symptoms"
		              :label="item"              
		              :value="index"
		              :rules="symptom_rules"		              		              	             
		            >
		            	
		            </v-checkbox>
		            
	           

		    	</v-col>

        	</v-row>

        	<v-row>
        		<v-col
		          cols="12"
		          sm="6"
		          md="12"
		        >
		        <v-btn		        	
		            color="primary"		            
		            @click="validate"
		          >
	            Submit
	          </v-btn>

		    	</v-col>

        	</v-row>
        	

        </v-container>
        </v-form>
      </v-main>
    </v-app>
</div>


@push('scripts')


<script>
	var token="{{csrf_token()}}";
	var thana_url = "{{url('public/js/thana.json')}}";
	var thana_data = [];
	$.getJSON( thana_url, function( data ) {
        //upaziladata = JSON.parse(data);
        $.each( data, function( key, val ) {
            thana_data.push(val);
        });
    });
	Vue.config.devtools = true;
    new Vue({
      el: '#app',
      vuetify: new Vuetify(),
      
      data:{
      	valid: true,
      	name:null,
      	name_rules:[
      		v => !!v || 'Name is required',
      	],
      	age:null,
      	age_rules:[
      		v => !!v || 'Age is required',
      		v => /^\d{1,3}$/.test(v) || 'Age must be number and length max 3 digit',
      	],
      	mobile_no:null,
      	mobile_no_rules:[
      		v => !!v || 'Mobile No is required',
      		v => /^(015|016|017|018|019|013|014)\d{8}$/.test(v) || 'Mobile No must be valid',
      	],
      	address:null,
      	address_rules:[
      		v => !!v || 'Address is required',
      	],
      	symptom:[],
      	thana:null,
      	thana_rules:[
      		v => !!v || 'Thana is required',      		
      	],
      	gender:null,
      	gender_rules:[
      		v => !!v || 'You must check one',
      	],
      	nid_bcn_both:null,
      	nid_bcn_both_rules:[
      		v => !!v || 'You must select an options',
      	],
      	nid:null,
      	bcn:null,

      	thanas: thana_data,

      	genders: @php echo json_encode(\App\Util\Requistion::get_gender(),false); @endphp,

      	nid_bcn_boths:@php echo json_encode(\App\Util\Requistion::get_nidbcnboth(),false); @endphp,

      	symptoms:  @php echo json_encode(\App\Util\Requistion::get_symptoms(),false); @endphp

      },

      computed:{
      	symptom_rules(){
      		return [
		        this.symptom.length > 0 || "At least one symptom should be selected"
		    ];
      	}
      },
      methods:{

      	validate () {
      		this.$refs.form.validate()
      	},

      	store:function() {

      		///console.log('test');

      		var vm = this;
      		var data = {
      			_token:token,
      			name: vm.name,
      			age : vm.age,
      			mobile_no: vm.mobile_no,
      			address: vm.address,
      			symptom: vm.symptom,
      			thana: vm.thana,
      			gender: vm.gender,
      			nid: vm.nid,
      			bcn: vm.bcn
      		};

      		$.ajax({
                    cache: false,
                    method: "POST",
                    url: "{{ url('covidregister') }}",
                    data: data,
            }).done(function( result ) {

            	//console.log(result);
            	window.location.href=result.redirect;

            });

      	}

     }


    })
 </script>
@endpush
@stop