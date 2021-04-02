<template>
    <div>
        <MedLoader v-if="loading" />

        <div v-else class="row">
            <div class="col-5">
                <button v-for="routeListItem in r01routes" :key="routeListItem.id" @click="SelectRoute(routeListItem)">
                    {{ routeListItem.title }}
                </button>
            </div>
            <div class="col-7"> 
                <h6>{{selectedItemID}} <br>{{selectedItemSchemeID}} <br>{{selectedItemScheme2ID}} <br>{{selectedItem}}</h6><br><br>

                <button @click="PrevScheme(selectedItemSchemeID)" id="prev_button" class="prevnextbutton">
                    Начало маршрута
                </button>
                <button v-if="route.schemes2 && route.schemes2.length > 0" @click="NextScheme(selectedItemScheme2ID)" id="next_button" class="prevnextbutton">
                    Продолжить маршрут
                </button>

                <div id="map" style="position: relative;">
                    <div v-for="scheme in schemes" :key="scheme.id" :id="'scheme_image_' + scheme.id" class="scheme_images">
                        <img :src="scheme.image" style="width:800px; height:450px;">
                    </div>

                    <svg id="svg1" class="map-path" viewBox="0 0 800 450">
                        <path v-if="route.x_01 !== null" class="key-anim01" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_01 + ' ' + route.y_01 + ', undefined undefined'"></path>
                        <circle v-if="route.x_01 !== null" id="01" :cx="route.x_01" :cy="route.y_01" r="7" fill="#f33"></circle>
                        <text v-if="route.x_01 !== null" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_01' :y='route.y_01' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_1_begin }}</tspan></text>

                        <path v-if="route.x_02 !== null" class="key-anim02" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_02 + ' ' + route.y_02 + ', ' + route.x_01 + ' ' + route.y_01"></path>
                        <circle v-if="route.x_02 !== null" id="02" :cx="route.x_02" :cy="route.y_02" r="7" fill="#f33"></circle>
                        <text v-if="route.x_02 !== null" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_02' :y='route.y_02' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_1_end }}</tspan></text>

                        <path v-if="route.x_03 !== null" class="key-anim03" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_03 + ' ' + route.y_03 + ', ' + route.x_02 + ' ' + route.y_02"></path>
                        <circle v-if="route.x_03 !== null" id="03" :cx="route.x_03" :cy="route.y_03" r="7" fill="#f33"></circle>
                        <text v-if="route.x_03 !== null" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_03' :y='route.y_03' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_1_end }}</tspan></text>

                        <path v-if="route.x_04 !== null" class="key-anim04" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_04 + ' ' + route.y_04 + ', ' + route.x_03 + ' ' + route.y_03"></path>
                        <circle v-if="route.x_04 !== null" id="04" :cx="route.x_04" :cy="route.y_04" r="7" fill="#f33"></circle>
                        <text v-if="route.x_04 !== null" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_04' :y='route.y_04' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_1_end }}</tspan></text>

                        <path v-if="route.x_05 !== null" class="key-anim05" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_05 + ' ' + route.y_05 + ', ' + route.x_04 + ' ' + route.y_04"></path>
                        <circle v-if="route.x_05 !== null" id="05" :cx="route.x_05" :cy="route.y_05" r="7" fill="#f33"></circle>
                        <text v-if="route.x_05 !== null" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_05' :y='route.y_05' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_1_end }}</tspan></text>

                        <path v-if="route.x_06 !== null" class="key-anim06" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_06 + ' ' + route.y_06 + ', ' + route.x_05 + ' ' + route.y_05"></path>
                        <circle v-if="route.x_06 !== null" id="06" :cx="route.x_06" :cy="route.y_06" r="7" fill="#f33"></circle>
                        <text v-if="route.x_06 !== null" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_06' :y='route.y_06' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_1_end }}</tspan></text>

                        <path v-if="route.x_07 !== null" class="key-anim07" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_07 + ' ' + route.y_07 + ', ' + route.x_06 + ' ' + route.y_06"></path>
                        <circle v-if="route.x_07 !== null" id="07" :cx="route.x_07" :cy="route.y_07" r="7" fill="#f33"></circle>
                        <text v-if="route.x_07 !== null" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_07' :y='route.y_07' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_1_end }}</tspan></text>

                        <path v-if="route.x_08 !== null" class="key-anim08" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_08 + ' ' + route.y_08 + ', ' + route.x_07 + ' ' + route.y_07"></path>
                        <circle v-if="route.x_08 !== null" id="08" :cx="route.x_08" :cy="route.y_08" r="7" fill="#f33"></circle>
                        <text v-if="route.x_08 !== null" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_08' :y='route.y_08' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_1_end }}</tspan></text>

                        <path v-if="route.x_09 !== null" class="key-anim09" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_09 + ' ' + route.y_09 + ', ' + route.x_08 + ' ' + route.y_08"></path>
                        <circle v-if="route.x_09 !== null" id="09" :cx="route.x_09" :cy="route.y_09" r="7" fill="#f33"></circle>
                        <text v-if="route.x_09 !== null" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_09' :y='route.y_09' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_1_end }}</tspan></text>

                        <path v-if="route.x_10 !== null" class="key-anim10" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_10 + ' ' + route.y_10 + ', ' + route.x_09 + ' ' + route.y_09"></path>
                        <circle v-if="route.x_10 !== null" id="10" :cx="route.x_10" :cy="route.y_10" r="7" fill="#f33"></circle>
                        <text v-if="route.x_10 !== null" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_10' :y='route.y_10' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_1_end }}</tspan></text>

                        <path v-if="route.x_11 !== null" class="key-anim11" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_11 + ' ' + route.y_11 + ', ' + route.x_10 + ' ' + route.y_10"></path>
                        <circle v-if="route.x_11 !== null" id="11" :cx="route.x_11" :cy="route.y_11" r="7" fill="#f33"></circle>
                        <text v-if="route.x_11 !== null" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_11' :y='route.y_11' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_1_end }}</tspan></text>

                        <path v-if="route.x_12 !== null" class="key-anim12" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_12 + ' ' + route.y_12 + ', ' + route.x_11 + ' ' + route.y_11"></path>
                        <circle v-if="route.x_12 !== null" id="12" :cx="route.x_12" :cy="route.y_12" r="7" fill="#f33"></circle>
                        <text v-if="route.x_12 !== null" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_12' :y='route.y_12' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_1_end }}</tspan></text>
                    </svg>

                    <svg id="svg2" class="map-path" viewBox="0 0 800 450">
                        <path v-if="route.x_101 !== null" class="key-anim01" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_101 + ' ' + route.y_101 + ', undefined undefined'"></path>
                        <circle v-if="route.x_101 !== null" id="01" :cx="route.x_101" :cy="route.y_101" r="7" fill="#f33"></circle>
                        <text v-if="route.x_101 !== null" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_101' :y='route.y_101' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_2_begin }}</tspan></text>

                        <path v-if="route.x_102 !== null" class="key-anim02" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_102 + ' ' + route.y_102 + ', ' + route.x_101 + ' ' + route.y_101"></path>
                        <circle v-if="route.x_102 !== null" id="02" :cx="route.x_102" :cy="route.y_102" r="7" fill="#f33"></circle>
                        <text v-if="route.x_102 !== null" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_102' :y='route.y_102' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_2_end }}</tspan></text>

                        <path v-if="route.x_103 !== null" class="key-anim03" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_103 + ' ' + route.y_103 + ', ' + route.x_102 + ' ' + route.y_102"></path>
                        <circle v-if="route.x_103 !== null" id="03" :cx="route.x_103" :cy="route.y_103" r="7" fill="#f33"></circle>
                        <text v-if="route.x_103 !== null" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_103' :y='route.y_103' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_2_end }}</tspan></text>

                        <path v-if="route.x_104 !== null" class="key-anim04" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_104 + ' ' + route.y_104 + ', ' + route.x_103 + ' ' + route.y_103"></path>
                        <circle v-if="route.x_104 !== null" id="04" :cx="route.x_104" :cy="route.y_104" r="7" fill="#f33"></circle>
                        <text v-if="route.x_104 !== null" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_104' :y='route.y_104' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_2_end }}</tspan></text>

                        <path v-if="route.x_105 !== null" class="key-anim05" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_105 + ' ' + route.y_105 + ', ' + route.x_104 + ' ' + route.y_104"></path>
                        <circle v-if="route.x_105 !== null" id="05" :cx="route.x_105" :cy="route.y_105" r="7" fill="#f33"></circle>
                        <text v-if="route.x_105 !== null" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_105' :y='route.y_105' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_2_end }}</tspan></text>

                        <path v-if="route.x_106 !== null" class="key-anim06" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_106 + ' ' + route.y_106 + ', ' + route.x_105 + ' ' + route.y_105"></path>
                        <circle v-if="route.x_106 !== null" id="06" :cx="route.x_106" :cy="route.y_106" r="7" fill="#f33"></circle>
                        <text v-if="route.x_106 !== null" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_106' :y='route.y_106' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_2_end }}</tspan></text>

                        <path v-if="route.x_107 !== null" class="key-anim07" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_107 + ' ' + route.y_107 + ', ' + route.x_106 + ' ' + route.y_106"></path>
                        <circle v-if="route.x_107 !== null" id="07" :cx="route.x_107" :cy="route.y_107" r="7" fill="#f33"></circle>
                        <text v-if="route.x_107 !== null" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_107' :y='route.y_107' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_2_end }}</tspan></text>

                        <path v-if="route.x_108 !== null" class="key-anim08" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_108 + ' ' + route.y_108 + ', ' + route.x_107 + ' ' + route.y_107"></path>
                        <circle v-if="route.x_108 !== null" id="08" :cx="route.x_108" :cy="route.y_108" r="7" fill="#f33"></circle>
                        <text v-if="route.x_108 !== null" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_108' :y='route.y_108' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_2_end }}</tspan></text>

                        <path v-if="route.x_109 !== null" class="key-anim09" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_109 + ' ' + route.y_109 + ', ' + route.x_108 + ' ' + route.y_108"></path>
                        <circle v-if="route.x_109 !== null" id="09" :cx="route.x_109" :cy="route.y_109" r="7" fill="#f33"></circle>
                        <text v-if="route.x_109 !== null" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_109' :y='route.y_109' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_2_end }}</tspan></text>

                        <path v-if="route.x_110 !== null" class="key-anim10" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_110 + ' ' + route.y_110 + ', ' + route.x_109 + ' ' + route.y_109"></path>
                        <circle v-if="route.x_110 !== null" id="10" :cx="route.x_110" :cy="route.y_110" r="7" fill="#f33"></circle>
                        <text v-if="route.x_110 !== null" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_110' :y='route.y_110' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_2_end }}</tspan></text>

                        <path v-if="route.x_111 !== null" class="key-anim11" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_111 + ' ' + route.y_111 + ', ' + route.x_110 + ' ' + route.y_110"></path>
                        <circle v-if="route.x_111 !== null" id="11" :cx="route.x_111" :cy="route.y_111" r="7" fill="#f33"></circle>
                        <text v-if="route.x_111 !== null" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_111' :y='route.y_111' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_2_end }}</tspan></text>

                        <path v-if="route.x_112 !== null" class="key-anim12" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_112 + ' ' + route.y_112 + ', ' + route.x_111 + ' ' + route.y_111"></path>
                        <circle v-if="route.x_112 !== null" id="12" :cx="route.x_112" :cy="route.y_112" r="7" fill="#f33"></circle>
                        <text v-if="route.x_112 !== null" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_112' :y='route.y_112' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_2_end }}</tspan></text>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import MedLoader from '../../../components/partials/med/loader.vue'

    export default {
        data() {
            return {
                schemes: [],
                map: {},
                r01routes: {},
                route: {},
                selectedItemID: '',
                selectedItemSchemeID: '',
                selectedItemScheme2ID: '',
                selectedItem: '',
                loading: true,
            }
        },
        created() {
            fetch(`/api/front/schemes`)
                .then(response => response.json())
                .then(json => {
                    this.schemes = json;
                    this.loading = false;
                });
            fetch(`/api/front/r01routes`)
                .then(response => response.json())
                .then(json => {
                    this.r01routes = json.data;
                    this.loading = false;
                });
        },
        methods: {
            SelectRoute(routeListItem) {
                this.selectedItemID = routeListItem.id;
                this.selectedItem = routeListItem.title;
                this.selectedItemSchemeID = routeListItem.scheme_id;
                this.selectedItemScheme2ID = routeListItem.scheme2_id;
                fetch(`/api/front/r01route/${this.selectedItemID}`)
                .then(response => response.json())
                .then(json => {
                    this.route = json;
                });
                document.querySelectorAll('.scheme_images').forEach(function(el) {
                    el.style.visibility = 'hidden';
                });
                document.getElementById('scheme_image_' + routeListItem.scheme_id)
                .style.visibility = 'visible';

                document.querySelectorAll('.map-path').forEach(function(el) {
                    el.style.visibility = 'hidden';
                });
                document.getElementById('svg1')
                .style.visibility = 'visible';

                document.querySelectorAll('.prevnextbutton').forEach(function(el) {
                    el.style.visibility = 'hidden';
                });
                document.getElementById('next_button')
                .style.visibility = 'visible';
            },
            PrevScheme(selectedItemSchemeID) {
                document.querySelectorAll('.scheme_images').forEach(function(el) {
                    el.style.visibility = 'hidden';
                });
                document.getElementById('scheme_image_' + selectedItemSchemeID)
                .style.visibility = 'visible';

                document.querySelectorAll('.map-path').forEach(function(el) {
                    el.style.visibility = 'hidden';
                });
                document.getElementById('svg1')
                .style.visibility = 'visible';

                document.querySelectorAll('.prevnextbutton').forEach(function(el) {
                    el.style.visibility = 'hidden';
                });
                document.getElementById('next_button')
                .style.visibility = 'visible';
            },
            NextScheme(selectedItemScheme2ID) {
                document.querySelectorAll('.scheme_images').forEach(function(el) {
                    el.style.visibility = 'hidden';
                });
                document.getElementById('scheme_image_' + selectedItemScheme2ID)
                .style.visibility = 'visible';

                document.querySelectorAll('.map-path').forEach(function(el) {
                    el.style.visibility = 'hidden';
                });
                document.getElementById('svg2')
                .style.visibility = 'visible';

                document.querySelectorAll('.prevnextbutton').forEach(function(el) {
                    el.style.visibility = 'hidden';
                });
                document.getElementById('prev_button')
                .style.visibility = 'visible';
            }
        },
        components: {
            MedLoader
        }
    }
</script>

<style scoped>
    .scheme_images {
        position: absolute;
        top: 0;
        left: 0;
    }
</style>