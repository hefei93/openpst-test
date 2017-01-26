/**
* LICENSE PLACEHOLDER
*
* @file qcdm_efs_close_file_request.h
* @package openpst/libopenpst
* @brief 
*
* @author Gassan Idriss <ghassani@gmail.com>
*/

#pragma once

#include "qualcomm/packet/dm_efs_packet.h"

using OpenPST::QC::DmEfsPacket;

namespace OpenPST {
    namespace QC {
        
        class QcdmEfsCloseFileRequest : public DmEfsPacket
        {
            public:
                /**
                * @brief Constructor
                */
                QcdmEfsCloseFileRequest();
                
                /**
                * @brief Destructor
                */
                ~QcdmEfsCloseFileRequest();

                /**
                * @brief Get fp
                * @return uint32_t
                */
                uint32_t getFp();
                
                /**
                * @brief Set fp
                * @param uint32_t fp
                * @return void
                */
                void setFp(uint32_t fp);

            void unpack(std::vector<uint8_t>& data) override;

        };
    }
}