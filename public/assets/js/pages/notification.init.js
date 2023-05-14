// Notification Init
const notificationSuccess = $("#notification-success").data("message");
const notificationError = $("#notification-error").data("message");
const notificationWarning = $("#notification-warning").data("message");
const notificationMessage = $("#notification-message").data("message");

if (notificationSuccess) {
  alertify.success(notificationSuccess);
}
if (notificationError) {
  alertify.error(notificationError);
}
if (notificationWarning) {
  alertify.warning(notificationWarning);
}
if (notificationMessage) {
  alertify.message(notificationMessage);
}
