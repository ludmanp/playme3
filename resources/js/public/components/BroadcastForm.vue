<template>
    <form action='' class='orderForm__form' @submit="submit">
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

        <button-default type="submit" :caption="labelEditBroadcast" v-if="dataModel.id"></button-default>

        <div class="info" v-if="dataModel.id">
            {{ labelCannotEdit }}
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
            <div class='orderForm__col'>
                <p class='orderForm__formSubheader'>{{ labelStartsAt }}</p>
                <div class="inputRow" v-for="date in dates" >
                    <input-field :time="true" type="time" v-model="date.starts_at" :readonly="cannotEdit()"></input-field>
                </div>
            </div>
            <div class='orderForm__col'>
                <p class='orderForm__formSubheader'>{{ labelArriveAt }}</p>
                <div class="inputRow" v-for="date in dates" >
                    <input-field :time="true" type="time" v-model="date.arrive_at" :readonly="cannotEdit()"></input-field>
                </div>
            </div>
        </div>
        <button type="button" class="button button_withImage button_green" @click="addDate" v-if="!cannotEdit()">
            <span class="link__icon">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 5.5V8.5C19 9.11875 18.4937 9.625 17.875 9.625L9.625 9.625L9.625 17.875C9.625 18.4937 9.11875 19 8.5 19H5.5C4.88125 19 4.375 18.4937 4.375 17.875L4.375 9.625H-3.875C-4.49375 9.625 -5 9.11875 -5 8.5V5.5C-5 4.88125 -4.49375 4.375 -3.875 4.375H4.375V-3.875C4.375 -4.49375 4.88125 -5 5.5 -5H8.5C9.11875 -5 9.625 -4.49375 9.625 -3.875V4.375L17.875 4.375C18.4937 4.375 19 4.88125 19 5.5Z" fill="#2AA84A"/>
                </svg>
            </span>
            {{ labelAddDate }}
        </button>

        <p class='orderForm__formSubheader'>{{ labelContactPerson }}</p>
        <div class='orderForm__row_contacts'>
            <div class='orderForm__row_contacts__col'>
                <input-field :placeholder="labelName" v-model="contact_name" :readonly="cannotEdit()"></input-field>
            </div>
            <div class='orderForm__row_contacts__col'>
                <input-field :placeholder="labelPhone" v-model="contact_phone" type="tel" :readonly="cannotEdit()"></input-field>
                <input-field :placeholder="labelEmail" v-model="contact_email" type="email" :readonly="cannotEdit()"></input-field>
            </div>
        </div>

        <slot name="broadcast-description"></slot>

        <div class='orderForm__row'>
            <p class='orderForm__formSubheader'>{{ labelCamera }}</p>
            <select-field :options="Array.from({length: 10}, (_, i) => i + 1)"
                          :label="labelCameraQuantity"
                          v-model="camerasQuantity"
                          :disabled="cannotEdit()"
            ></select-field>
            <checkbox-item v-model="isPublic" :green-text="true" @change="isPublicChanged" :disabled="cannotEdit()">
                <template v-slot:label>
                    {{ labelAvailableToAll }}
                </template>
            </checkbox-item>
            <checkbox-item v-model="isPrivate" :green-text="true" @change="isPrivateChanged" :disabled="cannotEdit()">
                <template v-slot:label>
                    {{ labelPasswordRequired }}
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
            <checkbox-item v-model="broadcastOnPlatform" :green-text="true" :disabled="cannotEdit()">
                <template v-slot:label>
                    {{ labelBroadcastOnPlatform }}
                </template>
            </checkbox-item>
        </div>

        <div class='orderForm__row'>
            <p class='orderForm__formSubheader'>{{ titleDecoration }}</p>
            <checkbox-item v-model="makeUp" :green-text="true" :disabled="cannotEdit()">
                <template v-slot:label>
                    {{ labelMakeup }}
                </template>
            </checkbox-item>
            <checkbox-item v-model="graphicDesign" :green-text="true" :disabled="cannotEdit()">
                <template v-slot:label>
                    {{ labelDesign }}
                </template>
            </checkbox-item>
        </div>

        <div class='orderForm__row'>
            <p class='orderForm__formSubheader'>{{ titleFinalVideo }}</p>
            <select-field :options="Array.from({length: 10}, (_, i) => i + 1)"
                          :label="labelCameraQuantity"
                          v-model="finalVideoCamerasQuantity"
                          :disabled="cannotEdit()"
            ></select-field>
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
        <button-default type="submit" :caption="labelCreateBroadcast" v-if="!dataModel.id"></button-default>
    </form>
</template>

<script>
import InputField from "./Form/InputField";
import TextareaField from "./Form/TextareaField";
import SelectField from "./Form/SelectField";
import CheckboxItem from "./Form/CheckboxItem";
import ButtonDefault from "./Form/ButtonDefault";

export default {
    name: "BroadcastForm",
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
        labelStartsAt: {
            type: String,
            required: true
        },
        labelArriveAt: {
            type: String,
            required: true
        },
        labelAddDate: {
            type: String,
            required: true
        },
        labelContactPerson: {
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
        labelCamera: {
            type: String,
            required: true
        },
        labelCameraQuantity: {
            type: String,
            required: true
        },
        labelAvailableToAll: {
            type: String,
            required: true
        },
        labelPasswordRequired: {
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
        labelBroadcastOnPlatform: {
            type: String,
            required: true
        },
        titleDecoration: {
            type: String,
            required: true
        },
        labelMakeup: {
            type: String,
            required: true
        },
        labelDesign: {
            type: String,
            required: true
        },
        titleFinalVideo: {
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
        labelCreateBroadcast: {
            type: String,
            required: true
        },
        labelEditBroadcast: {
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
            addresses: this.dataModel.addresses || [{'address': ''}],
            dates: this.dataModel.dates || [{'date': '', 'starts_at': '', 'arrive_at': ''}],
            contact_name: this.dataModel.contact_name,
            contact_phone: this.dataModel.contact_phone,
            contact_email: this.dataModel.contact_email,
            leader_name: this.dataModel.leader_name,
            leader_phone: this.dataModel.leader_phone,
            leader_email: this.dataModel.leader_email,
            company: this.dataModel.company,
            registration_nr: this.dataModel.registration_nr,
            legal_address: this.dataModel.legal_address,
            company_phone: this.dataModel.company_phone,
            company_email: this.dataModel.company_email,
            isPublic: typeof(this.dataModel.is_public) === 'undefined' ? true : this.dataModel.is_public,
            isPrivate: typeof(this.dataModel.is_public) === 'undefined' ? false : !this.dataModel.is_public,
            camerasQuantity: this.dataModel.parameters?.camerasQuantity || "1",
            equipmentDelivery: this.dataModel.parameters?.equipmentDelivery,
            broadcastOnPlatform: this.dataModel.parameters?.broadcastOnPlatform,
            makeUp: this.dataModel.parameters?.makeUp,
            graphicDesign: this.dataModel.parameters?.graphicDesign,
            finalVideoCamerasQuantity: this.dataModel.parameters?.finalVideoCamerasQuantity || "1",
            workWithLight: this.dataModel.parameters?.workWithLight,
            workWithSound: this.dataModel.parameters?.workWithSound,
            socialVideo: this.dataModel.parameters?.socialVideo,
            reportingVideo: this.dataModel.parameters?.reportingVideo,
            corporateVideo: this.dataModel.parameters?.corporateVideo,
            promoVideo: this.dataModel.parameters?.promoVideo,
            conference2h: this.dataModel.parameters?.conference2h,
            conference4h: this.dataModel.parameters?.conference4h,
            templateElements: this.dataModel.parameters?.templateElements,
            customElements: this.dataModel.parameters?.customElements,

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
    },
    methods: {
        addAddress() {
            this.addresses.push({'address': ''});
        },
        addDate() {
            this.dates.push({'date': '', 'starts_at': '', 'arrive_at': ''});
        },
        isPublicChanged() {
            this.isPrivate = !this.isPublic;
        },
        isPrivateChanged() {
            this.isPublic = !this.isPrivate;
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
                    addresses: this.addresses,
                    dates: this.dates,
                    contact_name: this.contact_name,
                    contact_phone: this.contact_phone,
                    contact_email: this.contact_email,
                    leader_name: this.leader_name,
                    leader_phone: this.leader_phone,
                    leader_email: this.leader_email,
                    company: this.company,
                    registration_nr: this.registration_nr,
                    legal_address: this.legal_address,
                    company_phone: this.company_phone,
                    company_email: this.company_email,
                    is_public: this.is_public,
                    parameters: {
                        camerasQuantity: this.camerasQuantity,
                        equipmentDelivery: this.equipmentDelivery,
                        broadcastOnPlatform: this.broadcastOnPlatform,
                        makeUp: this.makeUp,
                        graphicDesign: this.graphicDesign,
                        finalVideoCamerasQuantity: this.finalVideoCamerasQuantity,
                        workWithLight: this.workWithLight,
                        workWithSound: this.workWithSound,
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
                ? '/' + window.TypiCMS.locale + '/broadcast/' + this.dataModel.slug + '/edit'
                : '/' + window.TypiCMS.locale + '/broadcast/create'
            axios
                .post(url, data).then((response) => {
                    console.log(response);
                    window.location.href = '/' + window.TypiCMS.locale + '/profile';
                })
                .catch((error) => {
                    console.log('Cannot create broadcast: ', error);

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
                    document.body.scrollIntoView({ behavior: 'smooth', block: 'start'});
                });
        }
    }
}
</script>
