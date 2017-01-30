/**
* LICENSE PLACEHOLDER
*
* @file streaming_dload_unframed_stream_write_request.h
* @package openpst/libopenpst
* @brief 
*
* @author Gassan Idriss <ghassani@gmail.com>
*/

#pragma once

#include "qualcomm/packet/streaming_dload_packet.h"
#include "qualcomm/packet/streaming_dload_unframed_stream_write_response.h"

using OpenPST::QC::StreamingDloadPacket;
using OpenPST::QC::StreamingDloadUnframedStreamWriteResponse;

namespace OpenPST {
    namespace QC {
        
        class StreamingDloadUnframedStreamWriteRequest : public StreamingDloadPacket
        {
            public:
                /**
                * @brief Constructor
                */
                StreamingDloadUnframedStreamWriteRequest();
                
                /**
                * @brief Destructor
                */
                ~StreamingDloadUnframedStreamWriteRequest();

                /**
                * @brief Get alignment_padding
                * @return std::vector<uint8_t>
                */
                std::vector<uint8_t> getAlignmentPadding();
                
                /**
                * @brief Set alignment_padding
                * @param uint8_t* alignmentPadding
                * @param size_t size
                * @return void
                */
                void setAlignmentPadding(uint8_t* data, size_t size);
                /**
                * @brief Get address
                * @return uint32_t
                */
                uint32_t getAddress();
                
                /**
                * @brief Set address
                * @param uint32_t address
                * @return void
                */
                void setAddress(uint32_t address);
                /**
                * @brief Get length
                * @return uint32_t
                */
                uint32_t getLength();
                
                /**
                * @brief Set length
                * @param uint32_t length
                * @return void
                */
                void setLength(uint32_t length);
                /**
                * @brief Get data
                * @return std::vector<uint8_t>
                */
                std::vector<uint8_t> getData();
                
                /**
                * @brief Set data
                * @param std::ifstream& file
                * @param size_t size
                * @return void
                */
                void setData(std::ifstream& file, size_t size);
                /**
                * @brief Set data
                * @param uint8_t* data
                * @param size_t data
                * @return void
                */
                void setData(uint8_t* data, size_t size);
                /**
                * @brief Set data
                * @param const std::string& data
                * @return void
                */
                void setData(const std::string& data);
				/**
				* @overload Packet::unpack
				*/
	            void unpack(std::vector<uint8_t>& data) override;

				/**
				* @overload Packet::prepareResponse
				*/
				void prepareResponse() override;

        };
    }
}
