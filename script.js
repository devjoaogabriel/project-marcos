// Verifique se o navegador suporta notificações
if ("Notification" in window) {
    const botaoNotificacoes = document.getElementById("habilitar-notificacoes");

    // Adicione um evento de clique ao elemento <span>
    botaoNotificacoes.addEventListener("click", () => {
        // Solicitar permissão para notificações
        Notification.requestPermission().then((permission) => {
            if (permission === "granted") {
                // Se a permissão for concedida, exiba uma notificação de teste
                new Notification("Notificações habilitadas!", {
                    body: "Agora você receberá notificações desta página.",
                });
            }
        });
    });
}

