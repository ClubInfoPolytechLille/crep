$(document).ready(function() {
    function envoiRefresh(donnees) {
        $.post('orga.php', donnees, function(page) {
            $("#mainContainer").html(page);
        })
    }

    $(".ev_li").each(function(index) {
        var id = this.id.replace('ev_li_', '')
            // console.debug(id)
        _this = this
        $('.ev_modifier', this).click(function(e) {
            // console.debug(id, 'modifier', e)

            // Bouton
            $(e.currentTarget).replaceWith('<button type="button" class="ev_appliquer btn btn-success"><span class="glyphicon glyphicon-ok"></span> Appliquer les changements</button>')
            valider = $('#ev_li_' + id + ' .ev_appliquer')

            // Description
            // var description = $('.ev_description', _this)
            // TODO replaceWith ne fonctionne pas avec context (_this) pour une raison obscure
            var description = $('#ev_li_' + id + ' .ev_description')
            console.debug(description)
            description.replaceWith('<textarea class="ev_description form-control">' + description[0].innerHTML + '</textarea>')
            description = $('#ev_li_' + id + ' .ev_description')

            // Durée
            var duree = $('#ev_li_' + id + ' .ev_duree')
            console.debug($('.ev_duree_h', duree).text() || '00', ':', $('.ev_duree_m', duree).text() || '00')
            h = $('.ev_duree_h', duree).text() || 0
            h = h < 10 ? '0' + h : h
            m = $('.ev_duree_m', duree).text() || 0
            m = m < 10 ? '0' + m : m
            duree.replaceWith('<input type="time" class="ev_duree form-control"  value="' + h + ':' + m + '">')
            duree = $('#ev_li_' + id + ' .ev_duree')

            valider.click(function(e) {
                envoiRefresh({
                    action: 'modifier',
                    id: id,
                    id: description[0].innerHTML,
                    duree: parseInt(duree[0].value.match(/^../)[0]) * 3600 + parseInt(duree[0].value.match(/^..:(..)/)[1]) * 60
                })
            })
        })
        $('.ev_annuler', this).click(function(e) {
            // console.debug(id, 'annuler', e)
            if (window.confirm('Voulez-vous vraiment annuler cet évènement ?')) {
                envoiRefresh({
                    action: 'annuler',
                    id: id
                })
            }
        })
        $('.ev_supprimer', this).click(function(e) {
            // console.debug(id, 'supprimer', e)
            if (window.confirm('Voulez-vous vraiment supprimer cet évènement ? \nIl ne sera plus visible par personne.')) {
                envoiRefresh({
                    action: 'supprimer',
                    id: id
                })
            }
        })
        $('.ev_pos_proposer', this).click(function(e) {
            console.debug(id, 'pos_proposer', e)
            window.alert('Cette fonction n\'est pas enore implémentée :-(')
        })
        $('.ev_pos_valider', this).click(function(e) {
            console.debug(id, 'pos_valider', e)
            window.alert('Cette fonction n\'est pas enore implémentée :-(')
        })
    })
    $("#ev_ajouter_fixe").click(function(e) {
        console.debug('ajouter_fixe', e)
    })
    $("#ev_ajouter_choix").click(function(e) {
        console.debug('ajouter_choix', e)
    })
})
