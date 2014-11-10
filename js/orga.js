$(document).ready(function() {
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
                console.debug('ACTION modifier', id, description[0].innerHTML, duree[0].value)

                // TODO Envoyer et refresh
            })
        })
        $('.ev_annuler', this).click(function(e) {
            // console.debug(id, 'annuler', e)
            if (window.confirm('Voulez-vous vraiment annuler cet évènement ?')) {
                console.debug('ACTION annuler', id)

                // TODO Envoyer et refresh
            }
        })
        $('.ev_supprimer', this).click(function(e) {
            // console.debug(id, 'supprimer', e)
            if (window.confirm('Voulez-vous vraiment supprimer cet évènement ? \nIl ne sera plus visible.')) {
                console.debug('ACTION supprimer', id)
            }

            // TODO Envoyer et refresh
        })
        $('.ev_pos_proposer', this).click(function(e) {
            console.debug(id, 'pos_proposer', e)
        })
        $('.ev_pos_valider', this).click(function(e) {
            console.debug(id, 'pos_valider', e)
        })
    })
    $("#ev_ajouter_fixe").click(function(e) {
        console.debug('ajouter_fixe', e)
    })
    $("#ev_ajouter_choix").click(function(e) {
        console.debug('ajouter_choix', e)
    })
})
