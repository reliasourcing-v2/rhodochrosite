<template>
  <jet-action-section>
    <template #title> Two Factor Authentication </template>

    <template #description>
      Add additional security to your account using two factor authentication.
    </template>

    <template #content>
      <h3 class="text-lg font-medium text-gray-900" v-if="twoFactorEnabled">
        You have enabled two factor authentication.
      </h3>

      <h3 class="text-lg font-medium text-gray-900" v-else>
        You have not enabled two factor authentication.
      </h3>

      <div class="mt-3 max-w-xl text-sm text-gray-600">
        <p>
          When two factor authentication is enabled, you will be prompted for a
          secure, random token during authentication. You may retrieve this
          token from your phone's Google Authenticator application.
        </p>
      </div>

      <div v-if="twoFactorEnabled">
        <div v-if="qrCode">
          <div class="mt-4 max-w-xl text-sm text-gray-600">
            <p class="font-semibold">
              Two factor authentication is now enabled. Scan the following QR
              code using your phone's authenticator application.
            </p>
          </div>

          <div class="mt-4" v-html="qrCode"></div>
        </div>

        <div v-if="recoveryCodes.length > 0">
          <div class="mt-4 max-w-xl text-sm text-gray-600">
            <p class="font-semibold">
              Store these recovery codes in a secure password manager. They can
              be used to recover access to your account if your two factor
              authentication device is lost.
            </p>
          </div>

          <div
            class="
              grid
              gap-1
              max-w-xl
              mt-4
              px-4
              py-4
              font-mono
              text-sm
              bg-gray-100
              rounded-lg
            "
          >
            <div v-for="code in recoveryCodes" :key="code">
              {{ code }}
            </div>
          </div>
        </div>
      </div>

      <div class="mt-5">
        <div v-if="!twoFactorEnabled">
          <jet-confirms-password @confirmed="enableTwoFactorAuthentication">
            <action-button
              type="button"
              :class="{ 'opacity-25': enabling }"
              :disabled="enabling"
            >
              Enable
            </action-button>
          </jet-confirms-password>
        </div>

        <div v-else>
          <jet-confirms-password @confirmed="regenerateRecoveryCodes">
            <action-button class="mr-3" v-if="recoveryCodes.length > 0" fill="secondary">
              Regenerate Recovery Codes
            </action-button>
          </jet-confirms-password>

          <jet-confirms-password @confirmed="showRecoveryCodes">
            <action-button
              class="mr-3"
              fill="secondary"
              v-if="recoveryCodes.length === 0"
            >
              Show Recovery Codes
            </action-button>
          </jet-confirms-password>

          <jet-confirms-password @confirmed="disableTwoFactorAuthentication">
            <action-button
              :class="{ 'opacity-25': disabling }"
              :disabled="disabling"
              fill="danger"
            >
              Disable
            </action-button>
          </jet-confirms-password>
        </div>
      </div>
    </template>
  </jet-action-section>
</template>

<script>
import JetActionSection from "@/Components/Partials/JetActionSection.vue";
import JetConfirmsPassword from "@/Components/Inputs/ConfirmsPassword.vue";

export default {
  components: {
    JetActionSection,
    JetConfirmsPassword,
  },

  data() {
    return {
      enabling: false,
      disabling: false,

      qrCode: null,
      recoveryCodes: [],
    };
  },

  methods: {
    enableTwoFactorAuthentication() {
      this.enabling = true;

      this.$inertia.post(
        route(
          this.$page.props.user_type === "Admin"
            ? "admin.two-factor.enable"
            : "two-factor.enable"
        ),
        {},
        {
          preserveScroll: true,
          onSuccess: () =>
            Promise.all([this.showQrCode(), this.showRecoveryCodes()]),
          onFinish: () => (this.enabling = false),
        }
      );
    },

    showQrCode() {
      return axios
        .get(
          route(
            this.$page.props.user_type === "Admin"
              ? "admin.two-factor.qr-code"
              : "two-factor.qr-code"
          )
        )
        .then((response) => {
          this.qrCode = response.data.svg;
        });
    },

    showRecoveryCodes() {
      return axios
        .get(
          route(
            this.$page.props.user_type === "Admin"
              ? "admin.two-factor.recovery-codes"
              : "two-factor.recovery-codes"
          )
        )
        .then((response) => {
          this.recoveryCodes = response.data;
        });
    },

    regenerateRecoveryCodes() {
      axios
        .post(
          route(
            this.$page.props.user_type === "Admin"
              ? "admin.two-factor.recovery-codes"
              : "two-factor.recovery-codes"
          )
        )
        .then(() => {
          this.showRecoveryCodes();
        });
    },

    disableTwoFactorAuthentication() {
      this.disabling = true;

      this.$inertia.delete(
        route(
          this.$page.props.user_type === "Admin"
            ? "admin.two-factor.disable"
            : "two-factor.disable"
        ),
        {
          preserveScroll: true,
          onSuccess: () => (this.disabling = false),
        }
      );
    },
  },

  computed: {
    twoFactorEnabled() {
      return !this.enabling && this.$page.props.auth.user.two_factor_enabled;
    },
  },
};
</script>
