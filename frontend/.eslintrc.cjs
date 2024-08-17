/* eslint-env node */
module.exports = {
  "root": true,
  "extends": [
    "plugin:vue/essential",
    "eslint:recommended"
  ],
  "overrides": [
    {
      "files": [
        "cypress/e2e/**.{cy,spec}.{js,ts,jsx,tsx}"
      ],
      "extends": [
        "plugin:cypress/recommended"
      ]
    }
  ]
}
