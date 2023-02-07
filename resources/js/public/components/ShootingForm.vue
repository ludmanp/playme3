<template>
    <form action='' class='orderForm__form' @submit="submit" ref="form">
        <input type="hidden" name="_token" :value="csrfToken">
        <h2 class='orderForm__formHeader'>{{ formTitle }}</h2>

        <div class="alert alert-danger"
             v-if="errors.length"
        >
            <ul>
                <li v-for="error of errors">{{ error }}</li>
            </ul>
        </div>

        <div class='orderForm__row'>
            <div class="info" v-if="dataModel.status === 'declined'">
                {{ labelDeclined }}
            </div>

            <p class='orderForm__formSubheader'>{{ labelTitle }}</p>
            <input-field v-model="title"></input-field>
            <p class='orderForm__formSubheader'>{{ labelDescription }}</p>
            <textarea-field v-model="summary"></textarea-field>
        </div>

        <button-default type="submit" :caption="labelEditShooting" v-if="dataModel.id"></button-default>

        <div class="info" v-if="dataModel.id">
            {{ labelCannotEdit }}
        </div>

        <div class='orderForm__row'>
            <p class='orderForm__formSubheader'>{{ titleProduct }}</p>
            <checkbox-item  v-for="product in productsList" v-model="products" :value="product.key" v-bind:key="product.key" :green-text="true" :disabled="cannotEdit()">
                <template v-slot:label>
                    {{ product.title }}
                </template>
            </checkbox-item>
        </div>

        <p class='orderForm__formSubheader'>{{ labelAddresses }}</p>
        <div class="inputRow" v-for="address in addresses" >
            <input-field :location="true" type="text" :placeholder="labelAddress" v-model="address.address" :readonly="cannotEdit()"></input-field>
        </div>
        <button type="button" class="button button_withImage button_green" @click="addAddress" :disabled="!canAddAddress" v-if="!cannotEdit()">
            <span class="link__icon"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 5.5V8.5C19 9.11875 18.4937 9.625 17.875 9.625L9.625 9.625L9.625 17.875C9.625 18.4937 9.11875 19 8.5 19H5.5C4.88125 19 4.375 18.4937 4.375 17.875L4.375 9.625H-3.875C-4.49375 9.625 -5 9.11875 -5 8.5V5.5C-5 4.88125 -4.49375 4.375 -3.875 4.375H4.375V-3.875C4.375 -4.49375 4.88125 -5 5.5 -5H8.5C9.11875 -5 9.625 -4.49375 9.625 -3.875V4.375L17.875 4.375C18.4937 4.375 19 4.88125 19 5.5Z" fill="#2AA84A"/>
                </svg>
            </span>
            {{ labelAddAddress }}
        </button>

        <div class='orderForm__row_timetable'>
            <div class='orderForm__col'>
                <p class='orderForm__formSubheader'>{{ labelDate }}</p>
                <div class="inputRow" v-for="date in dates" >
                    <input-field :date="true" type="date" v-model="date.date" :readonly="cannotEdit()"></input-field>
                </div>
            </div>
        </div>
        <button type="button" class="button button_withImage button_green" @click="addDate" :disabled="!canAddDate" v-if="!cannotEdit()">
            <span class="link__icon">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 5.5V8.5C19 9.11875 18.4937 9.625 17.875 9.625L9.625 9.625L9.625 17.875C9.625 18.4937 9.11875 19 8.5 19H5.5C4.88125 19 4.375 18.4937 4.375 17.875L4.375 9.625H-3.875C-4.49375 9.625 -5 9.11875 -5 8.5V5.5C-5 4.88125 -4.49375 4.375 -3.875 4.375H4.375V-3.875C4.375 -4.49375 4.88125 -5 5.5 -5H8.5C9.11875 -5 9.625 -4.49375 9.625 -3.875V4.375L17.875 4.375C18.4937 4.375 19 4.88125 19 5.5Z" fill="#2AA84A"/>
                </svg>
            </span>
            {{ labelAddDate }}
        </button>

        <div class='orderForm__row'>
            <p class='orderForm__formSubheader'>{{ titleLeader }}:</p>
            <div class='orderForm__row_contacts'>
                <div class='orderForm__row_contacts__col'>
                    <input-field :placeholder="labelName" v-model="leader_name" :readonly="cannotEdit()"></input-field>
                </div>
                <div class='orderForm__row_contacts__col'>
                    <input-field :placeholder="labelPhone" v-model="leader_phone" type="tel" :readonly="cannotEdit()"></input-field>
                    <input-field :placeholder="labelEmail" v-model="leader_email" type="email" :readonly="cannotEdit()"></input-field>
                </div>
            </div>
            <p class='orderForm__formSubheader'>{{ titleCompany }}:</p>
            <div class='orderForm__row_contacts'>
                <div class='orderForm__row_contacts__col'>
                    <input-field :placeholder="labelCompanyName" v-model="company" :readonly="cannotEdit()"></input-field>
                </div>
                <div class='orderForm__row_contacts__col'>
                    <input-field :placeholder="labelRegistrationNumber" v-model="registration_nr" :readonly="cannotEdit()"></input-field>
                </div>
            </div>
            <div class='orderForm__row_contacts'>
                <div class='orderForm__row_contacts__col'>
                    <input-field :placeholder="labelLegalAddress" :location="true" v-model="legal_address" :readonly="cannotEdit()"></input-field>
                </div>
                <div class='orderForm__row_contacts__col'>
                    <input-field :placeholder="labelPhone" v-model="company_phone" type="tel" :readonly="cannotEdit()"></input-field>
                    <input-field :placeholder="labelEmail" v-model="company_email" type="email" :readonly="cannotEdit()"></input-field>
                </div>
            </div>
        </div>

        <p class='orderForm__formSubheader'>
            <button-default type="button" @click="clickThinkYourself" :caption="labelThinkYourself" v-if="!dataModel.id"></button-default>
        </p>

        <div class='orderForm__row'>
            <p class='orderForm__formSubheader'>{{ titleShootingPreparation }}</p>
            <checkbox-item v-model="creativeIdea" :green-text="true" :disabled="cannotEdit()">
                <template v-slot:label>
                    {{ labelCreativeIdea }}
                </template>
            </checkbox-item>
            <checkbox-item v-model="detailedScenario" :green-text="true" :disabled="cannotEdit()">
                <template v-slot:label>
                    {{ labelDetailedScenario }}
                </template>
            </checkbox-item>
            <checkbox-item v-model="storyBoard" :green-text="true" :disabled="cannotEdit()">
                <template v-slot:label>
                    {{ labelStoryBoard }}
                </template>
            </checkbox-item>
            <checkbox-item v-model="scenarioIsReady" :green-text="true" :disabled="cannotEdit()">
                <template v-slot:label>
                    {{ labelScenarioIsReady }}
                </template>
            </checkbox-item>
        </div>

        <div class='orderForm__row'>
            <p class='orderForm__formSubheader'>{{ titleShootingParameters }}</p>
            <select-field :options="Array.from({length: 10}, (_, i) => i + 1)"
                          :label="labelShootingCameras"
                          v-model="shootingCamerasQuantity"
                          :disabled="cannotEdit()"
            ></select-field><select-field :options="Array.from({length: 10}, (_, i) => i + 1)"
                          :label="labelPhotoCameras"
                          v-model="photoCamerasQuantity"
                          :disabled="cannotEdit()"
            ></select-field>
            <checkbox-item v-model="directorOnSet" :green-text="true" :disabled="cannotEdit()">
                <template v-slot:label>
                    {{ labelDirectorOnSet }}
                </template>
            </checkbox-item>
            <checkbox-item v-model="workWithLight" :green-text="true" :disabled="cannotEdit()">
                <template v-slot:label>
                    {{ labelVideoLight }}
                </template>
            </checkbox-item>
            <checkbox-item v-model="workWithSound" :green-text="true" :disabled="cannotEdit()">
                <template v-slot:label>
                    {{ labelVideoSound }}
                </template>
            </checkbox-item>
            <checkbox-item v-model="makeUp" :green-text="true" :disabled="cannotEdit()">
                <template v-slot:label>
                    {{ labelMakeup }}
                </template>
            </checkbox-item>
        </div>

        <div class='orderForm__row'>
            <p class='orderForm__formSubheader'>{{ titleLogistics }}</p>
            <checkbox-item v-model="equipmentDelivery" :green-text="true" :disabled="cannotEdit()">
                <template v-slot:label>
                    {{ labelEquipmentDelivery }}
                </template>
            </checkbox-item>
        </div>

        <div class='orderForm__row'>
            <p class='orderForm__formSubheader'>{{ titlePostProduction }}</p>
            <checkbox-item v-model="socialVideo" :green-text="true" :disabled="cannotEdit()">
                <template v-slot:label>
                    {{ labelSocialVideo }}
                </template>
            </checkbox-item>
            <checkbox-item v-model="reportingVideo" :green-text="true" :disabled="cannotEdit()">
                <template v-slot:label>
                    {{ labelReportingVideo }}
                </template>
            </checkbox-item>
            <checkbox-item v-model="corporateVideo" :green-text="true" :disabled="cannotEdit()">
                <template v-slot:label>
                    {{ labelCorporateVideo }}
                </template>
            </checkbox-item>
            <checkbox-item v-model="promoVideo" :green-text="true" :disabled="cannotEdit()">
                <template v-slot:label>
                    {{ labelPromoVideo }}
                </template>
            </checkbox-item>

            <checkbox-item v-model="conference2h" :green-text="true" :disabled="cannotEdit()">
                <template v-slot:label>
                    {{ labelConference2h }}
                </template>
            </checkbox-item>

            <checkbox-item v-model="conference4h" :green-text="true" :disabled="cannotEdit()">
                <template v-slot:label>
                    {{ labelConference4h }}
                </template>
            </checkbox-item>
            <checkbox-item v-model="templateElements" :green-text="true" :disabled="cannotEdit()">
                <template v-slot:label>
                    {{ labelTemplateElements }}
                </template>
            </checkbox-item>
            <checkbox-item v-model="customElements" :green-text="true" :disabled="cannotEdit()">
                <template v-slot:label>
                    {{ labelCustomElements }}
                </template>
            </checkbox-item>
        </div>

        <button-default type="submit" :caption="labelCreateShooting" v-if="!dataModel.id"></button-default>
    </form>
</template>

<script>
import TextareaField from "./Form/TextareaField.vue";
import InputField from "./Form/InputField.vue";
import CheckboxItem from "./Form/CheckboxItem.vue";
import SelectField from "./Form/SelectField.vue";
import ButtonDefault from "./Form/ButtonDefault.vue";

export default {
    name: "ShootingForm",
    components: {TextareaField, InputField, CheckboxItem, SelectField, ButtonDefault},
    props: {
        dataModel: {
            type: Object,
            default() {
                return {};
            }
        },
        csrfToken: {
            type: String,
            required: true
        },
        formTitle: {
            type: String,
            required: true
        },
        labelTitle: {
            type: String,
            required: true
        },
        labelDescription: {
            type: String,
            required: true
        },
        titleProduct: {
            type: String,
            required: true
        },
        productsList: {
            type: Array,
            required: true
        },
        labelAddresses: {
            type: String,
            required: true
        },
        labelAddress: {
            type: String,
            required: true
        },
        labelAddAddress: {
            type: String,
            required: true
        },
        labelDate: {
            type: String,
            required: true
        },
        labelAddDate: {
            type: String,
            required: true
        },
        labelName: {
            type: String,
            required: true
        },
        labelPhone: {
            type: String,
            required: true
        },
        labelEmail: {
            type: String,
            required: true
        },

        titleShootingPreparation: {
            type: String,
            required: true
        },
        labelCreativeIdea: {
            type: String,
            required: true
        },
        labelDetailedScenario: {
            type: String,
            required: true
        },
        labelStoryBoard: {
            type: String,
            required: true
        },
        labelScenarioIsReady: {
            type: String,
            required: true
        },

        titleShootingParameters: {
            type: String,
            required: true
        },
        labelShootingCameras: {
            type: String,
            required: true
        },
        labelPhotoCameras: {
            type: String,
            required: true
        },
        labelDirectorOnSet: {
            type: String,
            required: true
        },
        labelVideoLight: {
            type: String,
            required: true
        },
        labelVideoSound: {
            type: String,
            required: true
        },
        labelMakeup: {
            type: String,
            required: true
        },

        titleLogistics: {
            type: String,
            required: true
        },
        labelEquipmentDelivery: {
            type: String,
            required: true
        },
        titlePostProduction: {
            type: String,
            required: true
        },
        labelSocialVideo: {
            type: String,
            required: true
        },
        labelReportingVideo: {
            type: String,
            required: true
        },
        labelCorporateVideo: {
            type: String,
            required: true
        },
        labelPromoVideo: {
            type: String,
            required: true
        },
        labelConference2h: {
            type: String,
            required: true
        },
        labelConference4h: {
            type: String,
            required: true
        },
        labelTemplateElements: {
            type: String,
            required: true
        },
        labelCustomElements: {
            type: String,
            required: true
        },
        titleLeader: {
            type: String,
            required: true
        },
        titleCompany: {
            type: String,
            required: true
        },
        labelCompanyName: {
            type: String,
            required: true
        },
        labelRegistrationNumber: {
            type: String,
            required: true
        },
        labelLegalAddress: {
            type: String,
            required: true
        },
        labelCreateShooting: {
            type: String,
            required: true
        },
        labelEditShooting: {
            type: String,
            required: true
        },
        labelThinkYourself: {
            type: String,
            required: true
        },
        labelCannotEdit: {
            type: String,
            required: true
        },
        labelDeclined: {
            type: String,
            required: true
        },
    },
    data() {
        return {
            title: this.dataModel.title,
            summary: this.dataModel.summary,
            products: this.dataModel.product_list || [],
            addresses: this.dataModel.addresses || [{'address': ''}],
            dates: this.dataModel.dates || [{'date': ''}],
            leader_name: this.dataModel.leader_name,
            leader_phone: this.dataModel.leader_phone,
            leader_email: this.dataModel.leader_email,
            company: this.dataModel.company,
            registration_nr: this.dataModel.registration_nr,
            legal_address: this.dataModel.legal_address,
            company_phone: this.dataModel.company_phone,
            company_email: this.dataModel.company_email,

            creativeIdea: this.dataModel.parameters?.creativeIdea,
            detailedScenario: this.dataModel.parameters?.detailedScenario,
            storyBoard: this.dataModel.parameters?.storyBoard,
            scenarioIsReady: this.dataModel.parameters?.scenarioIsReady,
            shootingCamerasQuantity: this.dataModel.parameters?.shootingCamerasQuantity || "1",
            photoCamerasQuantity: this.dataModel.parameters?.photoCamerasQuantity || "1",
            directorOnSet: this.dataModel.parameters?.directorOnSet,
            workWithLight: this.dataModel.parameters?.workWithLight,
            workWithSound: this.dataModel.parameters?.workWithSound,
            makeUp: this.dataModel.parameters?.makeUp,
            equipmentDelivery: this.dataModel.parameters?.equipmentDelivery,
            socialVideo: this.dataModel.parameters?.socialVideo,
            reportingVideo: this.dataModel.parameters?.reportingVideo,
            corporateVideo: this.dataModel.parameters?.corporateVideo,
            promoVideo: this.dataModel.parameters?.promoVideo,
            conference2h: this.dataModel.parameters?.conference2h,
            conference4h: this.dataModel.parameters?.conference4h,
            templateElements: this.dataModel.parameters?.templateElements,
            customElements: this.dataModel.parameters?.customElements,

            thinkYourself: false,

            errors: [],
        }
    },
    computed: {
        canAddAddress() {
            if(this.addresses.length === 0) {
                return true;
            }
            return !!this.addresses[this.addresses.length - 1].address;

        },
        canAddDate() {
            if(this.dates.length === 0) {
                return true;
            }
            return !!this.dates[this.dates.length - 1].date;

        },
    },
    methods: {
        addAddress() {
            this.addresses.push({'address': ''});
        },
        addDate() {
            this.dates.push({'date': ''});
        },
        cannotEdit() {
            return !!this.dataModel.id;
        },

        submit(e) {
            e.preventDefault();
            this.errors = [];
            let data = this.dataModel.slug ?
                {
                    title: this.title,
                    summary: this.summary,
                } : {
                    title: this.title,
                    summary: this.summary,
                    products: this.products,
                    addresses: this.addresses,
                    dates: this.dates,
                    leader_name: this.leader_name,
                    leader_phone: this.leader_phone,
                    leader_email: this.leader_email,
                    company: this.company,
                    registration_nr: this.registration_nr,
                    legal_address: this.legal_address,
                    company_phone: this.company_phone,
                    company_email: this.company_email,
                    think_yourself: this.thinkYourself,
                    parameters: {
                        creativeIdea: this.creativeIdea,
                        detailedScenario: this.detailedScenario,
                        storyBoard: this.storyBoard,
                        scenarioIsReady: this.scenarioIsReady,
                        shootingCamerasQuantity: this.shootingCamerasQuantity,
                        photoCamerasQuantity: this.photoCamerasQuantity,
                        directorOnSet: this.directorOnSet,
                        workWithLight: this.workWithLight,
                        workWithSound: this.workWithSound,
                        makeUp: this.makeUp,
                        equipmentDelivery: this.equipmentDelivery,
                        socialVideo: this.socialVideo,
                        reportingVideo: this.reportingVideo,
                        corporateVideo: this.corporateVideo,
                        promoVideo: this.promoVideo,
                        conference2h: this.conference2h,
                        conference4h: this.conference4h,
                        templateElements: this.templateElements,
                        customElements: this.customElements,
                    }
                };

            const url = this.dataModel.id
                ? '/' + window.TypiCMS.locale + '/shooting/' + this.dataModel.slug + '/edit'
                : '/' + window.TypiCMS.locale + '/shooting/create'
            axios
                .post(url, data).then((response) => {
                window.location.href = '/' + window.TypiCMS.locale + '/profile';
            })
                .catch((error) => {
                    console.log('Cannot create shooting: ', error);

                    if(error.response.data?.errors) {
                        for(var key in error.response.data.errors) {
                            for(var value of error.response.data.errors[key]) {
                                this.errors.push(value);
                            }
                        }
                    }else if(error.response.data?.message) {
                        this.errors = [error.response.data.message];
                    } else {
                        this.errors = ['Unknown error'];
                    }
                })
                .finally(() => {
                    this.thinkYourself = false;
                    document.body.scrollIntoView({ behavior: 'smooth', block: 'start'});
                });
        },
        clickThinkYourself() {
            this.thinkYourself = true;
            this.$refs.form.dispatchEvent(new Event("submit"))
        }
    },
}
</script>

